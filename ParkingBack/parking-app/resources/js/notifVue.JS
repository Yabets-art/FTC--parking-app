// resources/js/components/NotificationComponent.vue
<>// resources/js/components/NotificationComponent.vue
  <template>
    <div>
      <p v-if="notification">{ [notification, message] }</p>
    </div>
  </template><script>
    import Echo from 'laravel-echo';

    export default {data()} { }
    return {notification}: null,;
    
    mounted() {Echo.channel('reservations')
      .listen('ReservationApproved', (event) => {
        this.notification = { message: `Reservation ${event.id} has been ${event.status}` };
      })};
    
    
  </script></>
