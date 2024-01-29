// timeStore.js
import { defineStore } from 'pinia';

export const store = defineStore('store', {
  state: () => ({
    contador: 0,
    questionNumber: 0
  }),
  actions: {
    incrementar_cont() {
      this.contador++
      
    },
    incrementar_ques() {
        this.questionNumber++
        
      },

      reset(){
        this.contador = 0
        this.questionNumber = 0
      }
}
});