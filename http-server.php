<?php
    $socket = socket_create_listen('12000');

    $client = socket_accept($socket); //looked at notes

    if($socket){

        while(true){

            $message = 'Welcome to port 12000 \n Type halt to exit.';

            socket_write($client,$message);

            while(true){

                $input = trim(socket_read($client,256));

                if($input == '!close'){

                    break;

                }

                if($input == 'halt'){

                    socket_close();

                    break 2;

                }

                $output = str_rot13($input);

                socket_write($client,$output);

            }

            socket_close($client);

        }
        
        socket_close($socket);

    }else{

        print 'Unable to connect to port 12000';

        exit();
    }
?>