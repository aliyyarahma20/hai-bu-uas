<template>
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
            {{ weekDates[index].getUTCDate() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      currentDate: new Date(),
      weekDays: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
      visitedDates: [],
      streakDates: [],
      currentStreak: 0,
      lastVisitDate: null,
    };
  },

  computed: {
    weekDates() {
      const dates = [];
      const currentDay = this.currentDate.getUTCDay();
      const startDate = new Date(Date.UTC(this.currentDate.getUTCFullYear(), this.currentDate.getUTCMonth(), this.currentDate.getUTCDate() - currentDay));

      for (let i = 0; i < 7; i++) {
        const date = new Date(startDate);
        date.setUTCDate(startDate.getUTCDate() + i);
        dates.push(date);
      }

      return dates;
    },

    formattedMonth() {
      return this.currentDate.toLocaleDateString("id-ID", {
        month: "long",
        year: "numeric",
        timeZone: "UTC",
      });
    },
  },

  methods: {
    handlePrevWeek() {
      const newDate = new Date(this.currentDate);
      newDate.setUTCDate(newDate.getUTCDate() - 7);
      this.currentDate = newDate;
    },

    handleNextWeek() {
      const newDate = new Date(this.currentDate);
      newDate.setUTCDate(newDate.getUTCDate() + 7);
      this.currentDate = newDate;
    },

    formatDate(date) {
      const d = new Date(date);
      return `${d.getUTCFullYear()}-${String(d.getUTCMonth() + 1).padStart(2, "0")}-${String(d.getUTCDate()).padStart(2, "0")}`;
    },

    getDayNameClass(index) {
      const today = new Date();
      return {
        "text-[#4B5945]": index === today.getUTCDay(),
      };
    },

    getDayClass(date) {
      const formattedDate = this.formatDate(date);
      const isVisited = this.visitedDates.includes(formattedDate);
      const isLastVisit = this.lastVisitDate === formattedDate;
      const isStreakDay = this.streakDates.includes(formattedDate);

      return {
        "bg-[#B2C9AD] text-white": isStreakDay,
        "border-2 border-[#4B5945]": isLastVisit,
        "bg-[#FFD700] text-black": isVisited && !isStreakDay && !isLastVisit,
        "text-[#4B5945]": !isStreakDay && !isVisited,
        "hover:bg-gray-100": !isStreakDay && !isVisited,
      };
    },

    async fetchStreakData() {
      try {
        const response = await axios.get("http://127.0.0.1:8000/api/user-activities");
        const data = response.data;

        const uniqueDates = [...new Set(data.map(activity => this.formatDate(activity.visit_date)))].sort();
        this.visitedDates = uniqueDates;

        if (uniqueDates.length > 0) {
          this.lastVisitDate = uniqueDates[uniqueDates.length - 1];
        }

        this.calculateStreak(uniqueDates);
      } catch (error) {
        console.error("Error dalam mengambil data streak:", error);
      }
    },

    calculateStreak(dates) {
      if (!dates.length) {
        this.streakDates = [];
        this.currentStreak = 0;
        return;
      }

      const datesToCheck = dates.map(date => {
        const d = new Date(date);
        return new Date(Date.UTC(d.getUTCFullYear(), d.getUTCMonth(), d.getUTCDate()));
      });

      datesToCheck.sort((a, b) => a - b);

      let currentStreak = [this.formatDate(datesToCheck[0])];

      for (let i = 1; i < datesToCheck.length; i++) {
        const prevDate = datesToCheck[i - 1];
        const currDate = datesToCheck[i];

        const diffTime = currDate - prevDate;
        const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

        if (diffDays === 1) {
          currentStreak.push(this.formatDate(currDate));
        } else {
          break;
        }
      }

      this.streakDates = currentStreak;
      this.currentStreak = currentStreak.length;
    },

    async markDay(date) {
      const formattedDate = this.formatDate(date);

      try {
        await axios.post("http://127.0.0.1:8000/api/user-activities", {
          visit_date: formattedDate,
        });

        this.lastVisitDate = formattedDate;
        await this.fetchStreakData();
      } catch (error) {
        console.error("Error saat menambahkan aktivitas:", error);
      }
    },
  },

  async mounted() {
    await this.fetchStreakData();
  },

  watch: {
    currentDate() {
      this.fetchStreakData();
    },
  },
};
</script>