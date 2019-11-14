<?php
/**
 * @author HoangDoan
 * Hide Assignment Information
 Instructions
 TomKat Entertainment is a chain of movie theaters owned by former husband and wife actors/entertainers. The owners want a database to track what movie is playing, or has played, on each screen in each theater of their chain at different times of the day.

 A theater (identified by a Theater ID and described by a theater name and location) contains one or more screens for viewing various movies.
 Within each theater, each screen is identified by its number and is described by the seating capacity for viewing the screen.
 A movie is identified by a Movie ID and further described by its title and type (i.e. drama, comedy, sci-fi, etc).
 Movies are scheduled for showing in time slots each day, Monday through Sunday. The start time of the time slots are as follows: 9am, 12pm, 3pm, 6pm, 9pm. For each time slot of each screen, the owners also want to know the number of moviegoers and the price charged for viewing of a movie in that time slot.
 What to do...
 Create a folder named lab5 in your development environment.

 In the folder do the following:

 Create an Entity Relationship Diagram (ERD) in third normal form with appropriate entities, attributes and relationships. Hand-drawn ERDs that are scanned or photographed may be submitted. Save the ERD as a PDF, PNG, GIF or JPG. (No other formats will be accepted)
 Create a web page using PHP Data Objects that will create a database called entertainment and then creates tables identified in the ERD. Use admin as the database user name and Pa11word as the password for connecting to the database. Create this user if it does not exist. Grant full access to the user.
 Create a web page called index.php which has links to PHP web pages for each table created in the database as described in the next step.
 For each table, create a web page using PHP Data Objects that lists the records that are in the table. The web page for each table must:
 Show an appropriate message if no records exist yet in the table.
 If records exists in the table, show all the attributes and provide Update and Delete links/buttons for each record.
 Provide a link/button to a web form that will Add a record into the table using PHP Data Objects. Once the record has been added, display the web page that lists the records of the table.
 Create a web form for the Update link that prompts the user to input updated information for that record (default existing data in the fields that can be updated) and saves the updated information replacing previous data stored in the record. Once the record has been updated, display the web page that lists the records of the table.
 Create a web form for the Delete link that displays the record information and prompts the user for confirmation to delete the record. If the user confirms the deletion, delete the record from that table. Once the record has been deleted (or the delete operation is not confirmed), display the web page that lists the records of the table.
 Example output for the movie table is shown below:

 */
?>