# LinSysEquaSolver

## Local development

1. Build and run Docker containers:

    ```sh
    docker-compose up -d
    ```

2. Navigate to the `src` directory in the terminal:

    ```sh
    cd src
    ```

3. Create a `.env` file and copy the contents of the `.env.example` file into the newly created file.

4. Install PHP and JS dependencies:

    ```sh
    composer install
    npm install
    ```

5. Launch the Laravel app's container terminal:

    ```sh
    docker exec -it linsysequasolver bash
    ```

    Once inside the container’s terminal, execute the following command to set the necessary permissions for the `storage` directory, ensuring Laravel has the write access it needs:

    ```sh
    chmod 777 storage/ -R
    ```

    Afterward, run the below command to generate an application key (this will automatically add the key into the `.env` file):

    ```sh
    php artisan key:generate
    ```

6. The Laravel app should be running at `http://localhost:8080`