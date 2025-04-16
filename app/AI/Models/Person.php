<?php

namespace App\AI\Models;

use App\AI\MyAgent;
use NeuronAI\Chat\Messages\UserMessage;
use NeuronAI\StructuredOutput\Property;

// Define the output structure with a PHP class, including validation constraints.
class Person
{
    #[Property(description: 'The user name')]
    public string $name;

    #[Property(description: 'What the user love to eat')]
    public string $preference;
}


// Talk to the agent requiring the structured output
$person = MyAgent::make()->structured(
    new UserMessage("I'm John and I like pizza!"),
    Person::class
);

echo $person->name . ' like ' . $person->preference;
// John like pizza
