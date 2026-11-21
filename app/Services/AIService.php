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
    public static function chatCompletion(array $messages, float $temperature = 0.3, int $maxTokens = 2500): ?string
    {
        $baseUrl = rtrim((string) config('services.ai.base_url', 'http://192.168.1.3:20128/v1'), '/');
        $apiKey  = (string) config('services.ai.api_key', '');
        $model   = (string) config('services.ai.model', 'pratama_ai');

        $url = $baseUrl . '/chat/completions';

        $payload = [
            'model'       => $model,
            'messages'    => $messages,
            'temperature' => $temperature,
            'max_tokens'  => $maxTokens,
        ];

        try {
            $req = Http::withoutVerifying()->timeout(60);
            if (!empty($apiKey)) {
                $req = $req->withToken($apiKey);
            }

            $response = $req->post($url, $payload);

            if ($response->successful()) {
                $data = $response->json();
                $content = $data['choices'][0]['message']['content'] ?? null;
                if ($content !== null) {
                    return trim($content);
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
