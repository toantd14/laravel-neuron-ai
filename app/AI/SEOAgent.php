<?php

namespace App\AI;

use NeuronAI\Agent;
use NeuronAI\MCP\McpConnector;
use NeuronAI\Providers\AIProviderInterface;
use NeuronAI\Providers\Anthropic\Anthropic;
use NeuronAI\SystemPrompt;
use NeuronAI\Tools\Tool;
use NeuronAI\Tools\ToolProperty;

class SEOAgent extends Agent
{
    public function provider(): AIProviderInterface
    {
        return new Anthropic(
            key: env('ANTHROPIC_API_KEY'),
            model: env('ANTHROPIC_MODEL'),
        );
    }

    public function instructions(): string
    {
        return new SystemPrompt(
            background: ["Act as an expert of SEO (Search Engine Optimization)."],
            steps: [
                "Analyze a text of an article.",
                "Provide suggestions on how the content can be improved to get a better rank on Google search."
            ],
            output: ["Structure your analysis in sections. One for each suggestion."]
        );
    }

    public function tools(): array
    {
        return [
            // Connect an MCP server
            ...McpConnector::make([
                'command' => 'npx',
                'args' => ['-y', '@modelcontextprotocol/server-everything'],
            ])->tools(),

            // Implement your custom tools
            Tool::make(
                'get_transcription',
                'Retrieve the transcription of a youtube video.',
            )->addProperty(
                new ToolProperty(
                    name: 'video_url',
                    type: 'string',
                    description: 'The URL of the YouTube video.',
                    required: true
                )
            )->setCallable(function (string $video_url) {
                // ... retrieve the video transcription
            })
        ];
    }
}
