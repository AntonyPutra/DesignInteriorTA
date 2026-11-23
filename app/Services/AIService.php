<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AIService
{
    /**
     * Send chat completion request to 9Router / OpenAI-compatible endpoint.
     *
     * @param array $messages Array of [['role' => 'system'|'user'|'assistant', 'content' => string]]
     * @param float $temperature Kept at 0.3 for consistent RAB calculations & recommendations
     * @param int $maxTokens Maximum output tokens
     * @return string|null Generated assistant message content
     */
    public static function chatCompletion(array $messages, float $temperature = 0.3, int $maxTokens = 3000): ?string
    {
        $baseUrl = rtrim((string) config('services.ninerouter.base_url', config('services.ai.base_url', 'http://100.73.16.92:20128/v1')), '/');
        $apiKey  = (string) config('services.ninerouter.api_key', config('services.ai.api_key', ''));
        $model   = (string) config('services.ninerouter.model', config('services.ai.model', 'pratama_ai'));

        $url = $baseUrl . '/chat/completions';

        $payload = [
            'model'            => $model,
            'messages'         => $messages,
            'temperature'      => $temperature,
            'max_tokens'       => $maxTokens,
            'stream'           => false,
            'reasoning_effort' => 'none',
        ];

        try {
            $req = Http::withoutVerifying()->timeout(120);
            if (!empty($apiKey)) {
                $req = $req->withToken($apiKey);
            }

            $response = $req->post($url, $payload);

            if ($response->successful()) {
                $rawBody = $response->body();
                $cleanBody = preg_replace('/\s*data:\s*\[DONE\]\s*$/i', '', trim($rawBody));
                $data = json_decode($cleanBody, true) ?: $response->json();

                $content = $data['choices'][0]['message']['content'] ?? null;
                if ($content === null && !empty($data['choices'][0]['message']['reasoning_content'])) {
                    $content = $data['choices'][0]['message']['reasoning_content'];
                }

                if ($content !== null) {
                    // Sanitasi reasoning tokens dari model pratama_ai
                    $sanitized = preg_replace('/<think>.*?<\/think>/s', '', $content);
                    return trim($sanitized);
                }
            }

            Log::error('9Router AI API Response Error: HTTP ' . $response->status() . ' - ' . $response->body());
            return null;
        } catch (\Throwable $e) {
            Log::error('9Router AI API Exception: ' . $e->getMessage());
            return null;
        }
    }
}
