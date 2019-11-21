# ssproject1
Server Side Group Project 1
Delta Team
Using the Entity Relationship Diagram (ERD) above, create a web application using PHP Data Objects to input data and then create a report that displays computers for a given building.

What to do...
Create a folder named teamproject in your development environment.

In the folder do the following:

Create a web page using PHP Data Objects that will create a database called inventory and then creates tables identified in the ERD above. Use admin as the database user name and Pa11word as the password for connecting to the database. Create this user if it does not exist. Grant full access to the user.
Create a web page called index.php which has links to PHP web pages for each table created in the database as described in the next step.
For each table, create a web page using PHP Data Objects that lists the records that are in the table. The web page for each table must:
Show an appropriate message if no records exist yet in the table.
If records exists in the table, show all the attributes and provide Update and Delete links/buttons for each record.
Provide a link/button to a web form that will Add a record into the table using PHP Data Objects. Once the record has been added, display the web page that lists the records of the table.
Create a web form for the Update link that prompts the user to input updated information for that record (default existing data in the fields that can be updated) and saves the updated information replacing previous data stored in the record. Once the record has been updated, display the web page that lists the records of the table.
Create a web form for the Delete link that displays the record information and prompts the user for confirmation to delete the record. If the user confirms the deletion, delete the record from that table. Once the record has been deleted (or the delete operation is not confirmed), display the web page that lists the records of the table.
Example output for a table is shown below:

Table-Example output

The example output above is only a suggestion. Be creative with your design of the web application. This includes the index.php page.
Create a web page called report.php linked from the index.php web page that uses PHP Data Objects to report the following for a rooms in a given building. Prompt the user for the Building ID and then for the records that match the information entered display:
Building ID, Number and Name
Room ID, Number and Capacity
For each room in a building, display the Vendor Name, Computer Model, MemorySize, StorageSize and Count. Take into consideration that a room can have different computer models from multiple vendors.
What to submit...
One team member must:

Zip all the files created for the project into a zip file named DeltaTeam-Project.zip and attach to this assignment. Only .zip files will be accepted. DO NOT submit individual files.
Submit the project on behalf of the team by going to Assignments, selecting the Team Project assignment, using the Add a File option to attach the .zip file to the assignment and then use the Submit button to submit the assignment.
