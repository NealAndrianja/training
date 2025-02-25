<?php
    enum Suit
    {
        case Hearts;
        case Diamonds;
        case Clubs;
        case Spades;
    }

    $myCards = Suit::Diamonds->name;

    var_dump($myCards);
