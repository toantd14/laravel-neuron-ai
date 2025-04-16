<?php

namespace App\AI;

use NeuronAI\Agent;
use NeuronAI\Providers\AIProviderInterface;
use NeuronAI\Chat\History\InMemoryChatHistory;
use NeuronAI\Providers\Anthropic\Anthropic;

class MyAgent extends Agent
{
    protected function provider(): AIProviderInterface
    {
        return new Anthropic(
            key: env('ANTHROPIC_API_KEY'),
            model: env('ANTHROPIC_MODEL'),
        );
    }

    protected function chatHistory(): InMemoryChatHistory
    {
        return new InMemoryChatHistory(
            contextWindow: 50000
        );

        // return new FileChatHistory(
        //     directory: '/laravel-neuron-ai/app/storage/neuron',
        //     key: '[user-id]',
        //     contextWindow: 50000
        // );
    }
}
