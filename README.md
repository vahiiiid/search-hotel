## Test Details

Implement a "hotel availability search" API that returns the best fare for a given date.  
In order to do so, we should check several upstream providers and return the fare with the highest margin (price - 
commission).  

### Functional Requirements:
 - Provider "Fraught Lodgings" has provided their inventory and availability in data/fraught-lodgings.yaml.  They charge
us a 5% commission on each booking.
 - Provider "Fantastic Yurts" has provided their inventory and availability in data/fantastic-yurts.yaml.  Their
commission is a flat 5 euro fee per room booked. 
 - We plan to add more providers soon, to whom we will connect via API.
 - Children under the age of 13 must never be alone in a room without adults.

### Examples
 - A search for a room for 3 adults from Jan-1-2022 through Jan-2-2022, should return room 4 from "American West Yurt",
   as American West Yurt is the only hotel with availability on those dates, and room 4 is the cheapest option.
 - Indian Burial Ground Yurts is available from both providers for the night of Jan 6.  The prices are the same, but 
   due to the commissions structure, the margin is preferable from Fantastic Yurts.
 - A search for a room for 5 adults for the same dates should return a package of 2 rooms, since not everyone can fit in 
   rooms 3 and 4.
 - The cheapest option for 4 guests for the dates Jan-3-2022 through Jan-5-2022, is in Yangtze River Yurts.  However,
   if 3 of the guests are children, this combination is not valid.  The next best price is room 2 at Unsavory Company Hostel.

### Other Details
- In the interest of time, please do not implement a database layer.
- We have provided a partial test implementation with an example request -- but this is purely for clarification and
there is no obligation to use what we have provided.
