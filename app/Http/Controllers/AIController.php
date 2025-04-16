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
    public function talkAgent()
    {
        // dd(123);

        // ==================================================
        $agent = YouTubeAgent::make();

        // PART 1
        $response = YouTubeAgent::make()->chat(new UserMessage("Hi! Who are you?"));
        echo $response->getContent();
        // Hi, I'm an AI assistant ready to help you today!


        // PART 2
        $response = YouTubeAgent::make()->chat(new UserMessage("Hi! Who are you?"));
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
}
