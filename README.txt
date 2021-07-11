Web aplication using laravel, the theme is a hotel.
User types: user, admin and manager

Users have the option to acsses the main page(login neaded) there they have acsses to the folowing options renting a room,
ading items to there minifrige, ading aditional servises(such as acsses to the pool, tenis field, gym, hair salon...) and they can pay the bill directly from the web site.

explaining the room sistem when a user selects the reservation option it redirects him to a page that shows him a list of rooms.There he choses a date of reservation, 
how many nights will he be staying and finaly he choses a room based on the number of beds avalible. After he choses a room that room is listed as ocupied and is not avalible 
to other users(canot be seen in the room list) until it is unoccupied where it will be visible to the other users once again.

Then admin role does crud operations on the the user role(they can change the user type), and is protected any one who does not have the admin user role and tries to enter the admin page 
will be redirected to difrent page.

The manager role has the most options
they overview the :

Employes:
CRUD operations
Employe shifts
Employe aperence at work
Employe working hours

Hotel services:
Crud operetions(ading new services,managing the prices...)
Can view user purchase history

Hotel Rooms:
Crud operations
Changing room occupancy

Hotel Minibars:
Crud operations
Can view user purchase history

Hotel Reservations:
Crud operations
Can view user purchase history

