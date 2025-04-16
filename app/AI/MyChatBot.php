<?php

namespace App\AI;

use NeuronAI\Providers\AIProviderInterface;
use NeuronAI\Providers\Anthropic\Anthropic;
use NeuronAI\RAG\Embeddings\EmbeddingsProviderInterface;
use NeuronAI\RAG\Embeddings\VoyageEmbeddingsProvider;
use NeuronAI\RAG\RAG;
use NeuronAI\RAG\VectorStore\PineconeVectorStore;
use NeuronAI\RAG\VectorStore\VectorStoreInterface;

class MyChatBot extends RAG
{
    public function provider(): AIProviderInterface
    {
        return new Anthropic(
            key: env('ANTHROPIC_API_KEY'),
            model: env('ANTHROPIC_MODEL'),
        );
    }

    public function embeddings(): EmbeddingsProviderInterface
    {
        return new VoyageEmbeddingsProvider(
            key: env('VOYAGE_API_KEY'),
            model: env('VOYAGE_MODEL'),
        );
    }

    public function vectorStore(): VectorStoreInterface
    {
        return new PineconeVectorStore(
            key: env('PINECONE_API_KEY'),
            indexUrl: env('PINECONE_INDEX_URL'),
        );
    }
}
