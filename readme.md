# Laravel Minify Html

Pacote para minificar o html de saída gerado pelo laravel

## Instalação

` composer require `

## Como utilizar?

Adicone a middleware `CompressHtml` no arquivo `App\Http\Kernel` no atributo `protected $middleware`

Exemplo:

```php
class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // ... Outras middlewares do projeto
        \Workspace\LaravelMinifyHtml\Middleware\CompressHtml:class,
    ];
}
```

## Exemplos da saída HTML

**Com a middleware instalada**

![With middleware](images/with_middleware.PNG?raw=true "With middleware")

**Sem a middleware instalada**

![Without middleware](images/without_middleware.PNG?raw=true "Without middleware")

## Changelog

Lista de mudanças, melhorias e correções de bugs. 

### *v1.0.0 - (04 Agosto 2018)*

- Criação e configuração da bilbioteca 