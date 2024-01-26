// timeStore.js
import { defineStore } from 'pinia';

export const useTimeStore = defineStore({
  id: 'time',
  state: () => ({
    minutes: 0,
    seconds: 0
  })
});