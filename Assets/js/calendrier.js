document.addEventListener("DOMContentLoaded", function() {
  const calendarEl = document.getElementById("calendar");
  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    locale: "fr",
    events: [
      { title: "Cours : Variables", start: "2025-02-05" },
      { title: "Examen : Boucles", start: "2025-02-15" }
    ]
  });
  calendar.render();
});
