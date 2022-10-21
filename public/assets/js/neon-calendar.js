/**
 *	Neon Calendar Script
 *
 *	Developed by Arlind Nushi - www.laborator.co
 */

var neonCalendar = neonCalendar || {};

;(function($, window, undefined)
{
	"use strict";

	$(document).ready(function()
	{

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });



		neonCalendar.$container = $(".calendar-env");

		$.extend(neonCalendar, {
			isPresent: neonCalendar.$container.length > 0
		});

		// Mail Container Height fit with the document
		if(neonCalendar.isPresent)
		{
			neonCalendar.$sidebar = neonCalendar.$container.find('.calendar-sidebar');
			neonCalendar.$body = neonCalendar.$container.find('.calendar-body');


			// Checkboxes
			var $cb = neonCalendar.$body.find('table thead input[type="checkbox"], table tfoot input[type="checkbox"]');

			$cb.on('click', function()
			{
				$cb.attr('checked', this.checked).trigger('change');

				calendar_toggle_checkbox_status(this.checked);
			});

			// Highlight
			neonCalendar.$body.find('table tbody input[type="checkbox"]').on('change', function()
			{
				$(this).closest('tr')[this.checked ? 'addClass' : 'removeClass']('highlight');
			});


			// Setup Calendar
			if($.isFunction($.fn.fullCalendar))
			{
				var calendar = $('#calendar');

				calendar.fullCalendar({
                    header: {
                        left: "title",
                        right: "month,basicWeek, today prev,next",
                    },

                    defaultView: "basicWeek",
                    events: "/get-timetable",

                    eventTimeFormat: {
                        // like '14:30:00'
                        hour: "2-digit",
                        minute: "2-digit",
                        second: "2-digit",
                        meridiem: false,
                    },
                    //selectable:true,
                    //selecthelper:true,
                    editable: true,
                    firstDay: 1,
                    height: 600,
                    //droppable: true,
                    select: function (start, end, allDay) {
                        var title = prompt("Enter event");
                    },
                });
                console.log(calendar);

				$("#draggable_events li a").draggable({
					zIndex: 999,
					revert: true,
					revertDuration: 0
				}).on('click', function()
				{
					return false;
				});
			}
			else
			{
				alert("Please include full-calendar script!");
			}


			$("body").on('submit', '#add_event_form', function(ev)
			{
				ev.preventDefault();

				var text = $("#add_event_form input");


				if(text.val().length == 0)
					return false;

				var classes = ['', 'color-green', 'color-blue', 'color-orange', 'color-primary', ''],
					_class = classes[ Math.floor(classes.length * Math.random()) ],
					$event = $('<li><a href="#"></a></li>');

				$event.find('a').text(text.val()).addClass(_class).attr('data-event-class', _class);

				$event.appendTo($("#draggable_events"));

				$("#draggable_events li a").draggable({
					zIndex: 999,
					revert: true,
					revertDuration: 0
				}).on('click', function()
				{
					return false;
				});

				//fit_calendar_container_height();

				$event.hide().slideDown('fast');
				text.val('');

				return false;
			});
		}
	});

})(jQuery, window);

function display(){
    var data;
        const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    var html_body = this.responseText;
                    //$('#course_id').html(html_body);
                    data = html_body;
                    console.log("sdds");
                    console.log(data);
                    console.log("sdds");
                }
                xmlhttp.open("GET", "/title");
                xmlhttp.send();
    console.log("sddssss");
    console.log(data);
    console.log("sddssss");
    return data;
    //return [{"id":1,"title":"lesson no 1","start":"2022-09-13 15:12:06","end":"2022-09-13 16:12:06"}];
}

function fit_calendar_container_height()
{
	if(neonCalendar.isPresent)
	{
		if(neonCalendar.$sidebar.height() < neonCalendar.$body.height())
		{
			neonCalendar.$sidebar.height( neonCalendar.$body.height() );
		}
		else
		{
			var old_height = neonCalendar.$sidebar.height();

			neonCalendar.$sidebar.height('');

			if(neonCalendar.$sidebar.height() < neonCalendar.$body.height())
			{
				neonCalendar.$sidebar.height(old_height);
			}
		}
	}
}

function reset_calendar_container_height()
{
	if(neonCalendar.isPresent)
	{
		neonCalendar.$sidebar.height('auto');
	}
}

function calendar_toggle_checkbox_status(checked)
{
	neonCalendar.$body.find('table tbody input[type="checkbox"]' + (checked ? '' : ':checked')).attr('checked',  ! checked).click();
}
