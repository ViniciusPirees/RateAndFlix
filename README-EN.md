# Rate and Flix
<h2>Final course project by FATEC ITU at the end of the semester in 2022.</h2>

Project made using HTML <img align="center" width='20' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg">, CSS <img align="center" width='20' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg">, JQuery   <img align="center" width='20' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jquery/jquery-original.svg">, PHP <img align="center" width='20' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg"> and MySQL <img align="center" width='20' src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg">
The primary goal was to create a web platform dedicated to the realm of entertainment and pop culture, specifically movies. Users can swiftly share their reviews of recently watched or long-time favorites, leaving behind their personal critique for others to read and determine whether or not to give the movie a chance. Additionally, the platform offers suggestions for similar movies and series, as well as the latest news in entertainment and pop culture.

The site was developed with the TMDB API, where we can search for information on all movies in the database, which is the main focus of the project. 
<div style="display: inline-block">
<img align="center" width='90' src="https://www.themoviedb.org/assets/2/v4/logos/v2/blue_square_2-d537fb228cf3ded904ef09b136fe3fec72548ebc1fea3fbbd1ad9e36364db38b.svg">
<a href="https://developers.themoviedb.org/3/getting-started/introduction">&nbsp&nbsp&nbsp Link to TheMoviesDB API documentation</a>
</div>
<br>
<h2>Rate & Flix Site Pages:</h2>
<h3>Home Page</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/telaprincipal.gif" width="580" height="300"/>
<br>

On the home page of the site, a carousel with popular movies is displayed, updated daily through the API. In addition, it is possible to view the news created by the site administrator, as well as the reviews and lists created by registered users. The page header offers options to access specific screens for categories, lists, movies by genre, news, and information about the creation of the site. It is also possible to search for a specific movie and log in with an existing account or register as a new user.

<br>
<h3>Movie Page (View)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/filmes.gif" width="580" height="300"/>
<br>
It presents the content of the movie, such as Title, Original Title, Summary, Year, Cast, and also some similar movies.

<br>
<h3>News Page (View)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/noticia.gif" width="580" height="300"/>
<br>
It presents the content of the news along with the latest news published on the site, accompanied by the corresponding category.

<br>
<h3>Lists Page (View)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/lista.gif" width="580" height="300"/>
<br>
It presents the list of movies created by a registered user along with the latest lists created on the site, accompanied by the corresponding category.

<h3>Login and Registration Page</h3>
<div style:"display= inline-block">
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/login.jpg" width="490" height="300"/> &nbsp&nbsp&nbsp 
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/cadastro.jpg" width="490" height="300"/>
</div>
<br>
On the registration page, some information is requested to be stored in the database, and on the login screen, the system searches for the corresponding user account for access.

<br>
<h3>Profile (News Creation)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/noticiasperfil.gif" width="580" height="300"/>
<br>
The news creation screen presents fields for inserting the title, text, and featured image (banner), in addition to the corresponding category. You can view the other news created by the same user. It is worth noting that only an administrator user has permission to create news on the site.

<br>
<h3>Profile (List Creation)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/noticiasperfil.gif" width="580" height="300"/>
<br>
On the list creation screen, the user (any registered user) can fill in the title, description, category, and most importantly: select the movies to add to the list. By typing the movie name in the search, it will request all movies with similar names in the API where the user can select the desired movie. It is also possible to view the other lists created by the user.

<br>
<h3>Profile (List Creation - Creation Process)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/listaperfileditar.gif" width="580" height="300"/>
<br>
The GIF presents the list creation process.

<br>
<h3>Profile (Review Creation)</h3>
<img src="https://github.com/ViniciusPirees/RateAndFlix/blob/main/gifs/criticas.gif" width="580" height="300"/>
<br>
When accessing the review creation screen, the user finds fields for inserting the title of the review, the review text itself, the rating assigned to the movie, and the option to choose the movie that will be reviewed. In addition, it is possible to view the other reviews created by the same user.
