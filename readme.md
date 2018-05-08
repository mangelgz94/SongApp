
## Recruitment Song App Project

This is the recruitment song app project. This application has the next extra features:

- Login with social networks
- Spotify API Integration


## Installation

#### General
The project has some migrations and seeds necessary for its functionality. This command can help you to have them set properly

php artisan migrate --seed

#### Login with social Networks

The project has login social network integration with Google+, Github and Linkedin, the next environment variables needs to be set to have this functionality:

- GITHUB_CLIENT_ID 
- GITHUB_CLIENT_SECRET

- LINKEDIN_CLIENT_ID
- LINKEDIN_CLIENT_SECRET

- GOOGLE_CLIENT_ID
- GOOGLE_CLIENT_SECRET

They can be found in the env.example.


### Spotify Playlist

Also, the application can retrieve information from a playlist from spotify, here's the environment variables that has to be set:

- SPOTIFY_CLIENT_ID
- SPOTIFY_CLIENT_SECRET
- SPOTIFY_USER_ID
- SPOTIFY_TRACKLIST_ID

If the application does not have this configuration, the songs page will be filled with dummy data. 





