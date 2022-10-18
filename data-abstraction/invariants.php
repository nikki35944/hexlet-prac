<?php
function makeRational($numer, $denom)
{
    if ($denom < 0) {
        $numer = -$numer;
        $denom = -$denom;
    }

    $gcd = gcd($numer, $denom);
    return ['numer' => $numer / $gcd, 'denom' => $denom / $gcd];
}

function getNumer($rational)
{
    return $rational['numer'];
}

function getDenom($rational)
{
    return $rational['denom'];
}

function add($rational1, $rational2)
{
    return makeRational(
        getNumer($rational1) * getDenom($rational2) + getNumer($rational2) * getDenom($rational1),
        getDenom($rational1) * getDenom($rational2)
    );
}

function sub($rational1, $rational2)
{
    return makeRational(
        getNumer($rational1) * getDenom($rational2) - getNumer($rational2) * getDenom($rational1),
        getDenom($rational1) * getDenom($rational2)
    );
}