<?php

class Info
{
    function getUsername($id)
    {
        global $container;
        $userRepository = $container->get('acme.demo.repository.user');
        $user = $userRepository->find($id);

        return $user->getUsername();
    }
}
 