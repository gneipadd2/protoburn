$(function(){  
  
    $('#calendar').fullCalendar({  
        header: {  
            left: 'prev,next today',    
            center: 'title',  
            right: 'month,agendaWeek,agendaDay',  
        },    
        events: {  
            url: 'data_events.php?gData=1',  
            error: function() {  
  
            }  
        },      
        eventLimit:true,  
        lang: 'th'  
    });  
       
}); 
