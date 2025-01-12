<template>
  <div class="bg-[#4B5945] rounded-xl p-6">
    <h3 class="text-white font-semibold mb-4">Progress Belajarmu</h3>
    <div class="bg-white rounded-lg p-4">
      <!-- Navigation bulan -->
      <div class="flex justify-between items-center mb-4">
        <button @click="handlePrevMonth" class="text-[#4B5945]">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </button>

        <span class="text-[#4B5945] font-medium">{{ formattedMonth }}</span>

        <button @click="handleNextMonth" class="text-[#4B5945]">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>

      <!-- Calendar grid -->
      <div class="grid grid-cols-7 gap-2">
        <!-- Header hari -->
        <div v-for="day in weekDays" :key="day" class="text-sm font-medium text-gray-600 text-center">
          {{ day }}
        </div>

        <!-- Blank spaces di awal bulan -->
        <div v-for="index in firstDayOfMonth" :key="'empty-'+index" class="calendar-day"></div>

        <!-- Hari-hari dalam bulan -->
        <div v-for="day in daysInMonth" 
             :key="'day-'+day"
             class="calendar-day h-8 w-8 rounded-full flex items-center justify-center cursor-pointer"
             :class="getDayClass(day)"
             @click="markDay(day)">
          {{ day }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'; // Import axios di bagian atas script

export default {
  data() {
    return {
      currentMonth: new Date(),
      weekDays: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
      visitedDates: [], // Akan diisi dari API
      streakCount: 0
    };
  },

  computed: {
    formattedMonth() {
      return this.currentMonth.toLocaleDateString('id-ID', { 
        month: 'long', 
        year: 'numeric' 
      });
    },

    daysInMonth() {
      return new Date(
        this.currentMonth.getFullYear(),
        this.currentMonth.getMonth() + 1,
        0
      ).getDate();
    },

    firstDayOfMonth() {
      return new Date(
        this.currentMonth.getFullYear(),
        this.currentMonth.getMonth(),
        1
      ).getDay();
    }
  },

  methods: {
    handlePrevMonth() {
      this.currentMonth.setMonth(this.currentMonth.getMonth() - 1);
      this.fetchStreakData(); // Ambil data streak setelah bulan berubah
    },

    handleNextMonth() {
      this.currentMonth.setMonth(this.currentMonth.getMonth() + 1);
      this.fetchStreakData(); // Ambil data streak setelah bulan berubah
    },

    getDayClass(day) {
      const currentDate = new Date(
        this.currentMonth.getFullYear(),
        this.currentMonth.getMonth(),
        day
      ).toISOString().split('T')[0]; // Format tanggal

      return {
        'bg-green-500 text-white': this.visitedDates.includes(currentDate), // Tandai dengan warna hijau jika sudah dikunjungi
        'hover:bg-gray-100': !this.visitedDates.includes(currentDate) // Hover effect jika belum dikunjungi
      };
    },

    async fetchStreakData() {
      try {
        // Ambil data dari API untuk mendapatkan tanggal yang sudah dikunjungi
        const response = await axios.get('/get-streak-data');
        this.visitedDates = response.data.visited_dates; // Menyimpan tanggal yang sudah dikunjungi
        this.streakCount = response.data.streak; // Menyimpan streak yang terbaru
      } catch (error) {
        console.error('Error fetching streak data:', error);
      }
    },

    async markDay(day) {
      const date = new Date(
        this.currentMonth.getFullYear(),
        this.currentMonth.getMonth(),
        day
      ).toISOString().split('T')[0]; // Format tanggal

      try {
        // Kirim data ke backend untuk mencatat aktivitas hari tersebut
        await axios.post('/track-visit', { date });
        await this.fetchStreakData(); // Ambil data streak terbaru setelah menandai hari
      } catch (error) {
        console.error('Error marking day:', error);
      }
    }
  },

  mounted() {
    this.fetchStreakData(); // Ambil data saat component dimuat
  }
};
</script>

<style scoped>
.calendar-day {
  aspect-ratio: 1;
}
</style>
