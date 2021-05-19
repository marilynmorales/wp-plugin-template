# About
Wordpress plugin template that supports custom api endpoints, db queries, shortcodes, hooks, and front-end connection. Simply run the install to get up and running!

## Requirements

 - Bash 4.0 (***for install only***)
 - Node 15.6.0+
 - PHP 7.4+
 - Wordpress 7.2+
  
## Install
In the root project folder
```bash
chmod +x ./install.sh
```
| CMD          | Description                                               |
|--------------|-----------------------------------------------------------|
| ./install.sh | prompts for plugin details and installs the project files |

## Example Folder Structure
```bash
├── SampleApp
│   ├── DB.php
│   ├── EndpointBase.php
│   ├── Endpoints.php
│   ├── Enqueue.php
│   ├── Filters.php
│   ├── Models
│   │   └── SampleModel.php
│   ├── Models.php
│   ├── Plugin.php
│   ├── Register.php
│   ├── SampleEndpoints.php
│   └── Shortcodes.php
├── assets
│   ├── package.json
│   ├── src
│   │   ├── images
│   │   ├── js
│   │   │   └── index.js
│   │   └── scss
│   │       └── main.scss
│   ├── webpack-dev.config.js
│   ├── webpack-prod.config.js
│   └── webpack.config.js
├── index.php
└── install.sh
```

## Front-End Commands
Run within the `./assets` folder
| CMD                      | Description                                   |
|--------------------------|-----------------------------------------------|
| npm run build:dev        | For local development.                        |
| npm run build:production | Optimizes JS and CSS. Runs Prettier check.    |
| npm run prettier:check   | Run check on JS and CS.                       |
| npm run prettier:write   | Fix prettier errors automatically.            |   

