<?php

function areUsersEqual(User $user1, User $user2)
{
    $hasSameIds = $user1->id === $user2->id;
    return $hasSameIds;
}