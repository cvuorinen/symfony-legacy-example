<?php

class User
{
    function User($user_id)
    {
        $this->twig = $GLOBALS['container']->get('twig');
        $this->userRepository = $GLOBALS['container']->get('acme.demo.repository.user');

        $this->keyvalue = $user_id;

        if (is_int($this->keyvalue)) {
            $this->loadData();
        }
    }

    function userInfo()
    {
        global $baseUrl;

        $data = [
            'user' => $this->user,
            'isAdmin' => isAdmin(),
            'baseUrl' => $baseUrl
        ];

        return $this->twig->render(
            'CvuorinenLegacyBundle:User:info.html.twig',
            $data
        );
    }

    function editUser()
    {
        global $request;

        if ($request->getMethod() == 'POST') {
            $this->user->setFirstname($request->request->get('firstname'));
            $this->user->setLastname($request->request->get('lastname'));

            $this->userRepository->save($this->user);
        }

        return $this->twig->render(
            'CvuorinenLegacyBundle:User:edit.html.twig',
            ['user' => $this->user]
        );
    }

    function loadData()
    {
        $this->user = $this->userRepository->find($this->keyvalue);
    }
}
