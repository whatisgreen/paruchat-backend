import React from 'react'
import Calendar from '@toast-ui/react-calendar';
import '@toast-ui/calendar/dist/toastui-calendar.min.css';

const TuiCalendar = () => {
  const calendars = [{ id: 'cal1', name: 'Personal' }];

  /*
  {
    title: 
    category: 
    start: 
    end: 
  }
  형식으로 json 받고 출력
   */
  const initialEvents = [
    {
      id: '1',
      calendarId: 'cal1',
      title: 'Lunch',
      category: 'time',
      start: '2023-04-11T12:00:00',
      end: '2023-04-13T13:30:00',
    },
  ];
  
  return (
    <div>
        <Calendar
        width="1000px"
        height="600px"
        view="month"
        week={{
          daynames: ['일', '월', '화', '수', '목', '금', '토'],
          showTimezoneCollapseButton: true,
          timezonesCollapsed: true
        }}
        month={{
          daynames: ['일', '월', '화', '수', '목', '금', '토'],
          // narrowWeekend: true
        }}
        theme=''
        calendars={calendars}
        events={initialEvents}
      />
      </div>
  )
}

export default TuiCalendar