<template>
  <!-- Template sama seperti sebelumnya -->
  <div class="bg-[#4B5945] rounded-xl p-6">
    <h3 class="text-white font-semibold mb-4">Progress Belajarmu</h3>
    <div class="bg-white rounded-lg p-4">
      <div class="flex justify-between items-center mb-6">
        <button @click="handlePrevWeek" class="text-[#4B5945]">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </button>

        <span class="text-[#4B5945] font-medium">{{ formattedMonth }}</span>

        <button @click="handleNextWeek" class="text-[#4B5945]">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>

      <div class="flex justify-between items-center">
        <div v-for="(day, index) in weekDays" :key="index" class="flex flex-col items-center w-12">
          <div class="text-sm text-gray-600 mb-2" :class="getDayNameClass(index)">{{ day }}</div>
          <div 
            class="flex items-center justify-center w-8 h-8 rounded-full cursor-pointer"
            :class="getDayClass(weekDates[index])"
            @click="markDay(weekDates[index])"
          >
            {{ weekDates[index].getDate() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentDate: new Date(),
      weekDays: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
      visitedDates: [],
      streakDates: [],
      currentStreak: 0,
      userId: 3,
      // Data testing sesuai dengan database Anda
      mockData: [
        { id: 1, user_id: 3, visit_date: '2025-01-12', created_at: '2025-01-12 00:33:09' },
        { id: 2, user_id: 3, visit_date: '2025-01-12', created_at: '2025-01-12 00:47:56' },
        { id: 3, user_id: 3, visit_date: '2025-01-13', created_at: '2025-01-13 01:06:09' },
        { id: 4, user_id: 3, visit_date: '2025-01-13', created_at: '2025-01-13 09:01:33' },
        { id: 4, user_id: 3, visit_date: '2025-01-11', created_at: '2025-01-13 09:01:33' },
      ]
    };
  },

  computed: {
    weekDates() {
      const dates = [];
      const currentDay = this.currentDate.getDay();
      const startDate = new Date(this.currentDate);
      startDate.setDate(this.currentDate.getDate() - currentDay);
      
      for (let i = 0; i < 7; i++) {
        const date = new Date(startDate);
        date.setDate(startDate.getDate() + i);
        dates.push(date);
      }
      
      return dates;
    },

    formattedMonth() {
      return this.currentDate.toLocaleDateString('id-ID', { 
        month: 'long',
        year: 'numeric'
      });
    }
  },

  methods: {
    handlePrevWeek() {
      const newDate = new Date(this.currentDate);
      newDate.setDate(newDate.getDate() - 7);
      this.currentDate = newDate;
      this.fetchStreakData();
    },

    handleNextWeek() {
      const newDate = new Date(this.currentDate);
      newDate.setDate(newDate.getDate() + 7);
      this.currentDate = newDate;
      this.fetchStreakData();
    },

    formatDate(date) {
      const d = new Date(date);
      return d.toISOString().split('T')[0];
    },

    getDayNameClass(index) {
      return {
        'text-[#4B5945]': index === this.currentDate.getDay()
      };
    },

    getDayClass(date) {
      const formattedDate = this.formatDate(date);
      const isToday = formattedDate === this.formatDate(new Date());
      const isStreakDay = this.streakDates.includes(formattedDate);
      
      return {
        'bg-[#B2C9AD] text-white': isStreakDay,
        'border-2 border-[#4B5945]': isToday,
        'text-[#4B5945]': !isStreakDay,
        'hover:bg-gray-100': !isStreakDay
      };
    },

    fetchStreakData() {
      try {
        // Gunakan mockData untuk testing
        const data = this.mockData.filter(item => item.user_id === this.userId);
        
        // Dapatkan tanggal unik
        const uniqueDates = [...new Set(
          data.map(activity => activity.visit_date)
        )].sort();
        
        console.log('Tanggal unik:', uniqueDates);
        
        this.visitedDates = uniqueDates;
        this.calculateStreak(uniqueDates);
      } catch (error) {
        console.error('Error dalam mengambil data streak:', error);
      }
    },

    calculateStreak(dates) {
      if (!dates.length) {
        this.streakDates = [];
        this.currentStreak = 0;
        return;
      }

      console.log('Menghitung streak untuk tanggal:', dates);

      // Konversi string tanggal ke objek Date
      const datesToCheck = dates.map(date => new Date(date));
      
      // Urutkan tanggal dari yang terlama ke terbaru
      datesToCheck.sort((a, b) => a - b);
      
      let currentStreak = [this.formatDate(datesToCheck[0])];
      
      // Cek setiap tanggal berurutan
      for (let i = 1; i < datesToCheck.length; i++) {
        const prevDate = datesToCheck[i - 1];
        const currDate = datesToCheck[i];
        
        // Hitung selisih hari
        const diffTime = Math.abs(currDate - prevDate);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        
        console.log(`Membandingkan ${this.formatDate(prevDate)} dengan ${this.formatDate(currDate)}, selisih: ${diffDays} hari`);
        
        if (diffDays === 1) {
          currentStreak.push(this.formatDate(currDate));
        } else {
          break; // Streak terputus
        }
      }

      this.streakDates = currentStreak;
      this.currentStreak = currentStreak.length;
      
      console.log('Streak akhir:', this.streakDates);
      console.log('Panjang streak:', this.currentStreak);
    },

    async markDay(date) {
      const today = new Date();
      today.setHours(0, 0, 0, 0);
      
      const selectedDate = new Date(date);
      selectedDate.setHours(0, 0, 0, 0);
      
      if (selectedDate.getTime() === today.getTime()) {
        // Untuk testing, tambahkan ke mockData
        this.mockData.push({
          id: this.mockData.length + 1,
          user_id: this.userId,
          visit_date: this.formatDate(date),
          created_at: new Date().toISOString()
        });
        
        this.fetchStreakData();
      }
    }
  },

  mounted() {
    this.fetchStreakData();
  }
};
</script>