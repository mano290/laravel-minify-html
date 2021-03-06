# Laravel Minify Output HTML

Pacote para minificar o html de saída gerado pelo laravel sem utilizar bibliotecas externas.

## Instalação da biblioteca

Usando o composer utilize o seguinte comando:

`composer require workspace/laravel-minify-html`

## Como utilizar?

O pacote fornece uma middleware onde comprimi o HTML gerado pelo response laravel.

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
        \Workspace\LaravelMinifyHtml\Middleware\CompressHtml::class,
    ];
}
```

Caso você queria desabilitar a compressão HTML sem retirar a middleware coloque em seu `.env`

```dotenv
## Disable minify output html
LARAVEL_MINIFY_HTML=false
```

## Exemplos da saída HTML

- **Com a middleware habilitada**

![With middleware](images/with_middleware.PNG?raw=true "With middleware")

- **Com a middleware desabilitada**

![Without middleware](images/without_middleware.PNG?raw=true "Without middleware")

## Changelog

Lista de mudanças, melhorias e correções de bugs. 

### *v1.0.0 - (04 Agosto 2018)*

- Criação e configuração da bilbioteca 