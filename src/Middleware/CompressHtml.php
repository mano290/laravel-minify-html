<?php namespace Workspace\LaravelMinifyHtml\Middleware;

use Closure;

/**
 * Class CompressHtml
 * @package Workspace\LaravelMinifyHtml\Middleware
 */
class CompressHtml
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $is_active = env("LARAVEL_MINIFY_HTML", true);

        if($this->isHtmlResponse($response) && $is_active) {

            $output = $response->getContent();

            $minified = $this->minify($output);

            $response->setContent($minified);
        }

        return $response;
    }

    /**
     * Check if the content type header is html.
     *
     * @param $response
     *
     * @return bool
     */
    protected function isHtmlResponse($response)
    {
        $type = $response->headers->get('Content-Type');

        return strtolower(strtok($type, ';')) === 'text/html';
    }

    /**
     * Compress html
     *
     * @param $content
     *
     * @return null|string|string[]
     */
    private function minify($content)
    {
        $search = [
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s',         // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        ];

        $replace = ['>', '<', '\\1', ''];

        return preg_replace($search, $replace, $content);
    }
}
