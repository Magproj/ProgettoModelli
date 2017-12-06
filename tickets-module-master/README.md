# Conference Tools: Tickets
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/conferencetools/tickets-module/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/conferencetools/tickets-module/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/conferencetools/tickets-module/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/conferencetools/tickets-module/?branch=master) 

This is an open source ticketing system I built for PHP Yorkshire. The features are still quite restricted, however the core is fairly solid. Please try this out for your event and if it doesn't meet your needs, raise issues for any missing features you would require to use it in the future. 

The entire application is event sourced, so even if you don't run a conference, you might find this an interesting application to study.

# Documenation
Full documantation is available at https://conferencetools.github.io/docs/tickets/

# Features

## Ticketing
- Define multiple different ticket types at different price points
- Restrict ticket types by date (eg early bird tickets which run out 3 months before the event)
- Restrict ticket types by number 
- Reserve some ticket types for admin use only (eg sponsor tickets, speaker tickets etc)
- Ticket purchases automatically time out after 30 mins
- Delegate information can be added at purchase time and modified later

## Discount codes
- Define multiple different discount codes 
- Percentage off discount type
- Fixed discount type
- Fixed discount per ticket type

## General
- Stripe integration for payment handling
- Email reciept to each customer
- VAT/Tax handling

## Admin (via CLI application)
- Issue free tickets
- Cancel tickets 

## Reporting
- Generate reports as csv files (via CLI application) 
- Delegate information (for use as a gate list / badge printing)
- Missing delegate information (Chase anyone who hasn't filled out their details)
- Delegate requirements (Send on to caterers for food provision)
- Ticket mailout (export into a mailing app to send final details to your attendees)
- Ticket sales (breakdown of sales by type and used discount code)
