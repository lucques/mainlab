# MaInLab

This repo contains the contents for the website [https://mainlab.site](https://mainlab.site). The website serves material for learning math and CS. All courses are freely accessible.


## Installation
1. Clone the conjin project, e.g. to `repos/conjin`
2. Clone this repository, e.g. to `/repos/mainlab`
3. Create the following files:
    - [./deployments/APP_DIR](./deployments/APP_DIR) (contains path, here: `/repos/mainlab`)
    - [./deployments/CONJIN_DIR](./deployments/CONJIN_DIR) (contains path, here: `repos/conjin`)
    - [./deployments/DEPLOYMENTS_DIR](./deployments/DEPLOYMENTS_DIR) (contains path, here: `repos/mainlab/`)
    - [./deployments/EXTERNAL_TOOLS_PATH](./deployments/EXTERNAL_TOOLS_PATH) (contains path, here: `repos/conjin/build-tools/tools-external.dhall`)
    - [./deployments/dmainlab/src/RCLONE_CONFIG_PATH](./deployments/dmainlab/src/RCLONE_CONFIG_PATH) (path to config file)
    - [./deployments/dcd/src/password_list.dhall](./deployments/dcd/src/password_list.dhall) (of type `PasswordList`)
4. Follow installation instructions of the [conjin project](https://github.com/lucques/conjin/).


## License
This project is licensed under CC BY-SA 4.0.