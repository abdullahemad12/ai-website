# <p align = "center"> machinelearning-department</p>
a website for the newly created machine learning group in the GUC


# <p align = "center"> Contents of the webiste</p> 

<ol>
	<li><b>home page:</b>
		<ul>
			<li>
				small slide show
			</li>
			<li>
				upcoming Events
			</li>
		</ul>
	</li>
	<li><b>projects and research (editable)</b>
		<ul>
			<li>
				index: lists all the projects in the database and adds hyper link to each one
			</li>
			<li>
				project: views the project detail (users can remove a project --Activities is updated--)
			</li>
			<li>
				add: users can add a new project (updates activities)
			</li>
		</ul>
	</li>
	<li><b> Courses (editable)</b>
		<ul>
			<li>a list of all the courses offered by the machine learning department</li>
		</ul>
	</li>
	<li><b>Events</b>
		<ul>
			<li>Upcoming Events</li>
			<li>Archieved Events</li>
		</ul>
	</li>
	<li><b>Contact us</b>
		<ul>
			<li>Fetches the phone number and email of the admin from the data base (dynamic)</li>
			<li>includes all the facebook accounts, instagram ...etc (static)</li>
		</ul>
	</li>
	<li> <b>About Page (editable)</b>
		<ul>
			<li>
				About the Machine learning department <br> Note: Credit for ourself
			</li>
			<li>This should right directly to the server not to the database</li>		
		</ul>
	</li>
	<li> <b>Add/remove members</b>
		<ul>
			<li>This page is only visible to the admin</li>
		</ul>
	</li>
	<li><b>My account</b>
		<ul>
			<li>users can reset their passwords</li>
			<li>users can change the personal info</li>
			<li>users can upload a profile picture</li>
			<li>Only admins can create new users</li>
			<li>view all the activities of the users</li>
		</ul>
	</li>
	<li> <b>Footer &#10004;</b>
		<ul>
			<li>Copyrights &#10004;</li>
			<li>Github repository &#10004;</li>
			<li>Facebook Group &#10004;</li>
			<li>Youtube &#10004;</li>
			<li>Instagram &#10004;</li>
		<ul>
	</li>
	
</ol> 

# <p align = "center">Admins and members auth: </p>

<ul>
	<li>Admins
		<ul>
			<li>Remove and add members</li>
		</ul>
	</li>
	<li>Both
		<ul>
			<li><b> Events</b> Create new events</li>
			<li><b>Events</b> All events are archieved automatically</li>
			<li><b>Projects and research</b> Add a project or a research</li>
			<li><b>Projects and research</b> Remove a project or a research</li>
			<li><b>Courses</b> Add Courses (Only admins)</li>
			<li><b>Courses</b> Remove Courses (Only admins)</li>
			<li><b>About</b> edit the content of the about page</li>
		</ul>
	</li>
</ul>
<h2 align = "center">Database tables </h2>
<ol>
	<li><b>Users (default)&#10004;</b>
		<ul>
			<li>Summary &#10004;</li>
			<li>Phone number Nullabel &#10004;</li>
			<li>Authority &#10004;</li>
		</ul>
	</li>
	<li><b>Researchs</b>
		<ul>
			<li>uploader &#10004;</li>
			<li>title &#10004;</li>
			<li>Description &#10004;</li>
			<li>created at &#10004;</li>
			<li>Updated at &#10004;</li>
		</ul>
	</li>
	<li><b>Courses</b>
		<ul>
			<li>title &#10004;</li>
			<li>Instructor &#10004;</li>
			<li>description &#10004;</li>
			<li>Created_at &#10004;</li>
			<li>Updated_at &#10004;</li>
		</ul>
	</li>
	<li><b>Events &#10004;</b>
		<ul>	
			<li>Creator &#10004;</li>
			<li>title &#10004;</li>
			<li>Description &#10004;</li>
			<li>Location &#10004;</li>
			<li>Starts at &#10004;</li>
			<li>Ends at &#10004;</li>
		</ul>
	</li>
	<li><b>Activities &#10004;</b>
		<ul>
			<li>user_id &#10004;</li>
			<li>Activity &#10004;</li>
			<li>title &#10004;</li>
			<li>date &#10004;</li>
		</ul>
	</li>
</ol>



# <p align = "center">Tasks</p>

# Abdullah Emad:
<ol>
	<li>Migrations &#10004;</li>
	<li>Header and footer &#10004;</li>
	<li>projects and research</li>
	<li>Account</li>
	<li>users activities &#10004;</li>
	<li>Library</li>
</ol>

# Ahmed Shawky
<ol>
	<li>home page</li>
	<li>Courses</li>
	<li>About page</li>
	<li>contact</li>
	<li>events</li>
	<li>Add and remove members</li>
</ol>

# <p align = "center">Conditions</p>
This site was dedicated to the GUC machine learning department under two conditions:
1) Credits should be given to Abdullah Emad and Ahmed Shawky for building this website
2) The contents of the page should remain accessible to the public. Unless some confidential information must be placed on the website and sharing it will effect any member of the community.. Otherwise, research papers, courses, project, etc  should remain public





