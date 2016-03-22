<div class="timetable">
  {facets}
    <p>{facet} facet</p>
    {bookings}
    <div class="booking">
      <p>{facet}</p>
      <p>{day}</p>
      <p>{timeslot}</p>
      <p>{course}</p>
      <p>{instructor}</p>
      <p>{room}</p>
      <p>{classtype}</p>
    </div>
    {/bookings}
  {/facets}
</div>

<div class="search">
  <form method="post" action="welcome/search">
    Search for a booking on
    <select name="day">
      {days}
        <option value="{day}">{day}</option>
      {/days}
    </select>
    at
    <select name="time">
      {times}
        <option value="{slot}">{slot}</option>
      {/times}
    </select>
    <input type='submit' value='Search'>
  </form>
</div>
