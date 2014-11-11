<?php

namespace Cvuorinen\LegacyBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class LegacyUserProvider implements UserProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function loadUserByUsername($username)
    {
        return new User(
            $username,
            null,
            // the roles for the user - you may choose to determine
            // these dynamically somehow based on the user
            array('ROLE_USER')
        );
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $user)
    {
        if (! $user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return 'Symfony\Component\Security\Core\User\User' === $class;
    }
}
