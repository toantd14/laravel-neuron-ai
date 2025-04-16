<?php

namespace App\Http\Controllers;

use App\AI\MyAgent;
use Illuminate\Http\Request;
use App\AI\YouTubeAgent;
use NeuronAI\Agent;
use NeuronAI\Chat\Messages\Message;
use NeuronAI\Chat\Messages\UserMessage;
use NeuronAI\Exceptions\MissingCallbackParameter;
use NeuronAI\Exceptions\ToolCallableNotSet;

class AIController extends Controller
{
    /**
     * @throws MissingCallbackParameter
     * @throws ToolCallableNotSet
     */
    public function talkAgent(): void
    {
        // dd(123);

        // ==================================================
        $agent = YouTubeAgent::make();

        // PART 1
        $response = $agent->chat(new UserMessage("Hi! Who are you?"));
        echo $response->getContent();
        // Hi, I'm an AI assistant ready to help you today!


        // PART 2
        $response = $agent->chat(new UserMessage("Hi! Who are you?"));
        echo $response->getContent();
        // Hi, I'm a frindly AI agent specialized in summarizing YouTube videos!
        // Can you give me the URL of a YouTube video you want a quick summary of?


        // PART 3
        $response = $agent->chat(new UserMessage("Hi, I'm Valerio. Who are you?"));
        echo $response->getContent();
        // I'm a friendly YouTube assistant to help you summarize videos.

        $response = $agent->chat(new UserMessage("Do you know my name?"));
        echo $response->getContent();
        // Your name is Valerio, as you said in your introduction.

        $response = $agent->chat(new UserMessage("What's my name?"));
        echo $response->getContent();
        // I'm sorry I don't know your name. Do you want to tell me more about yourself?


        // ==================================================
        // $agent = Agent::make();
        //
        // $response = $agent->chat([
        //     new Message("user", "Hi, I work for a company called Inspector.dev"),
        //     new Message("assistant", "Hi Valerio, how can I assist you today?"),
        //     new Message("user", "What's the name of the company I work for?"),
        // ]);
        // echo $response->getContent();
        // // You work for Inspector.dev

    }

    /**
     * @return void
     */
    public function videoTrans(): void
    {
        // dd(456);

        // ==================================================
        $agent = YouTubeAgent::make();

        $response = $agent->chat(
            new UserMessage("What about this video: https://www.youtube.com/watch?v=WmVLcj-XKnM")
        );
        echo $response->getContent();

        /**
            This video presents a monologue from the perspective of Nature herself, speaking directly to humanity. In an authoritative tone, Nature reminds us that she has existed for 4.5 billion years—22,500 times longer than humans—and doesn't need people, though people depend entirely on her. She warns that humanity's future rests on her wellbeing, as her flourishing means human flourishing, while her decline will bring worse consequences for us. Nature explains that she has nurtured species more magnificent than humans and has starved greater species to extinction. Her oceans, soil, rivers, and forests can either sustain humanity or abandon it. She concludes by stating that regardless of whether humans acknowledge or ignore her, their actions determine only their own fate, not hers, as Nature will endure through change while questioning if humanity can do the same.

            Three most important takeaways:
            1. Nature has existed for billions of years without humans and will continue to exist regardless of human actions, but humans cannot survive without Nature.
            2. The wellbeing of humanity is directly linked to the wellbeing of natural systems—oceans, soil, rivers, and forests.
            3. How humans choose to act toward Nature determines humanity's future, not Nature's, as she is built to endure change while humans may not be.
         */

    }
}
