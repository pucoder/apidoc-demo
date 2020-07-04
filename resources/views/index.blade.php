<!DOCTYPE html>
<html>
<head>
    <title>接口开发文档</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" media="screen">
</head>
<body>

<nav class="nav-top">
    <a id="forkme" href="https://github.com/pucoder/apidoc"><img src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png" alt="Fork me on GitHub"></a>
    <ul>
        <li><a href="#demo">Demo</a></li>
        <li><a href="#getting-started">Getting started</a></li>
        <li><a href="#params">APIDOC-Params</a></li>
    </ul>
</nav>

<div class="container">

    <header>
        <h1>APIDOC</h1>
        <h2>Online interface documents developed for laravel and lumen</h2>
        <h3>apiDoc creates a documentation from API annotations in your source code.</h3>
        <h3>中文自己翻译，应该不难</h3>
        <div class="pull-left">
            <p>can get annotation data in time</p>
            <p>beautiful appearance and easy operation</p>
        </div>
    </header>

    <div id="main">
        <aside>
            <nav class="nav-main" style="margin-top: 0;">
                <ul>
                    <li class="nav-header" id="nav-main-params"><a href="#demo">Demo</a></li>
                    <li class="nav-header"><a href="#getting-started">Getting started</a></li>
                    <li><a href="#preface">Preface</a></li>
                    <li><a href="#install">Install</a></li>
                    <li><a href="#run">Run</a></li>
                    <li><a href="#configuration">Configuration (apidoc.php)</a></li>
                    <li class="nav-header"><a href="#params">apiDoc-Params</a></li>
                    <li><a href="#param-api-version">@apiVersion</a></li>
                    <li><a href="#param-api-group">@apiGroup</a></li>
                    <li><a href="#param-api-name">@apiName</a></li>
                    <li><a href="#param-api">@api</a></li>
                    <li><a href="#param-api-description">@apiDescription</a></li>
                    <li><a href="#param-api-header">@apiHeader</a></li>
                    <li><a href="#param-api-header-example">@apiHeaderExample</a></li>
                    <li><a href="#param-api-param">@apiParam</a></li>
                    <li><a href="#param-api-param-example">@apiParamExample</a></li>
                    <li><a href="#param-api-error-example">@apiErrorExample</a></li>
                    <li><a href="#param-api-success-example">@apiSuccessExample</a></li>
                    <li><a href="#param-api-sample-request">@apiSampleRequest</a></li>
                </ul>
            </nav>
        </aside>
        <div id="content" role="main">

            <!--
             /* ============================================================
              * Demo
              * ============================================================ */
            -->
            <section id="demo">
                <h1>Demo</h1>

                <article id="demo-ouput">
                    <h2>This is an example documentation:</h2>
                    <a href="/apidoc"><img src="/img/example.png" width="241" height="171" alt="Example" title="Example output of a generated apidoc" class="with-border"></a>
                    <p><a href="/apidoc" title="demo">watch demo output »</a></p>
                </article>
            </section>

            <!--
             /* ============================================================
              * Getting started
              * ============================================================ */
            -->
            <section id="getting-started">
                <h1>Getting started</h1>

                <article id="preface">
                    <h2>Preface</h2>
                    <p>First, thanks to <a href="https://apidocjs.com/">apidoc</a> for providing inspiration,I'm lazy,(:</p>
                    <p>I am a php developer, I will use development documents and interface documents in the process of developing software, which greatly facilitates my development process</p>
                    <p>forExample <a href="https://apidocjs.com/">apidoc</a>,Every time you need to run a command to refresh the annotation data, it is inconvenient, but it is beautiful</p>
                    <p>forExample <a href="https://swagger.io/">Swagger</a>,Can see the annotation data in time, but the appearance is not good, the operation is not convenient</p>
                    <p>So I designed this api online document myself, it can get the annotation data in time, not only beautiful but also convenient</p>
                </article>

                <article id="install">
                    <h2>Install</h2>
                    <pre><code>composer require pucoder/apidoc</code></pre>
                </article>

                <article id="run">
                    <h2>Run</h2>
                    <h3>laravel</h3>
                    <p>publish resources</p>
                    <pre><code>php artisan apidoc:publish</code></pre>
                    <h3>lumen</h3>
                    <p>Register Service Providers in <code>bootstrap/app.php</code></p>
                    <pre class="example"><code>$app->register(Pucoder\Apidoc\ApiDocServiceProvider::class);</code></pre>
                    <p>publish resources</p>
                    <pre><code>php artisan apidoc:publish</code></pre>
                    <p>Register Config Files in <code>bootstrap/app.php</code></p>
                    <pre class="example"><code>$app->configure('apidoc');</code></pre>
                    <p>open Facades in <code>bootstrap/app.php</code></p>
                    <pre class="example"><code>$app->withFacades();</code></pre>
                </article>

                <article id="configuration">
                    <h2>Configuration (apidoc.php)</h2>
                    <p>publish resources command will be <code>config</code> directory generate <code>apidoc.php</code> file</p>
                    <pre class="example"><code>'title' => 'apidoc-title',
'name' => 'apidoc-name',
'description' => 'apidoc-description',
'dir' => 'App/Http/Controllers',
'except_folders' => ['auth'],
'except_files' => ['Controller.php'],
'local' => [
    'en' => [
        'header' => 'request header',
        'form' => 'form',
        'header-param' => 'request header parameters',
        'form-param' => 'form parameters',
        'field' => 'field',
        'type' => 'type',
        'description' => 'description',
        'optional' => 'optional',
        'send-examples-request' => 'send a sample request',
        'send-request' => 'send request',
        'return-result' => 'return result',
        'choose' => 'choose'
    ],
    'zh-CN' => [
        'header' => '请求头',
        'form' => '表单',
        'header-param' => '请求头参数',
        'form-param' => '表单参数',
        'field' => '字段',
        'type' => '类型',
        'description' => '描述',
        'optional' => '可选',
        'send-examples-request' => '发送示例请求',
        'send-request' => '发送请求',
        'return-result' => '返回结果',
        'choose' => '选择'
    ]
]</code></pre>

                    <h3 id="configuration-settings">Settings for apidoc.php</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">title</td>
                            <td>api document title,<code>required value</code></td>
                        </tr>
                        <tr>
                            <td class="code">name</td>
                            <td>api document name,<code>required value</code></td>
                        </tr>
                        <tr>
                            <td class="code">description</td>
                            <td>api document description, support html code,<code>required value</code></td>
                        </tr>
                        <tr>
                            <td class="code">dir</td>
                            <td>Need to provide api documentation directory</td>
                        </tr>
                        <tr>
                            <td class="code">except_folders</td>
                            <td>Directory to be excluded, relative to dir, array type</td>
                        </tr>
                        <tr>
                            <td class="code">except_files</td>
                            <td>Files to be excluded, relative to dir, array type</td>
                        </tr>
                        <tr>
                            <td class="code">local</td>
                            <td>local translation,language comes from <code>config('app.locale')</code></td>
                        </tr>
                        </tbody>
                    </table>
                </article>
            </section>

            <!--
             /* ============================================================
              * Params
              * ============================================================ */
            -->
            <section id="params">
                <h1>apiDoc-Params</h1>
                <p>Only correct comments can be displayed by apidoc. Wrong comments will show exceptions. Please read them carefully. Later update versions may add parameters</p>

                <article id="param-api-version">
                    <h2>@apiVersion</h2>
                    <pre><code>@apiVersion version</code></pre>
                    <p><strong>Required!</strong></p>
                    <p>Display the current interface modification version number</p>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">version</td>
                            <td>
                                Simple versioning supported
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Example:</p>
                    <pre class="example"><code>/**
 * @apiVersion 1.6.2
 */</code></pre>
                </article>

                <article id="param-api-group">
                    <h2>@apiGroup</h2>
                    <pre><code>@apiGroup name</code></pre>
                    <p><strong>Required!</strong></p>
                    <p>Defines to which group the method documentation block belongs. Groups will be used for the Main-Navigation in the generated output</p>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">name</td>
                            <td>
                                Name of the group. Also used as navigation title.
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Example:</p>
                    <pre class="example"><code>/**
 * @apiGroup Users
 */</code></pre>
                </article>

                <article id="param-api-name">
                    <h2>@apiName</h2>
                    <pre><code>@apiName name</code></pre>
                    <p><strong>Required!</strong></p>
                    <p>Defines the name of the method documentation block. Names will be used for the Sub-Navigation in the generated output</p>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">name</td>
                            <td>
                                Unique name of the method. Same name with different <code>@apiVersion</code> can be defined.<br>
                                Format: <i>method</i> + <i>path</i> (e.g. Get + User), only a proposal, you can name as you want.<br>
                                Also used as navigation title.<br>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Example:</p>
                    <pre class="example"><code>/**
 * @apiName getUser
 */</code></pre>
                </article>

                <article id="param-api">
                    <h2>@api</h2>
                    <pre><code>@api method path title</code></pre>
                    <p><strong>Required!</strong></p>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">method</td>
                            <td>
                                Request method name: <code>GET</code>, <code>POST</code>, <code>PUT</code>, <code>DELETE</code>, <code>PATCH</code>, ...<br>
                                More info <a href="http://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol#Request_methods">Wikipedia HTTP-Request_methods</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">path</td>
                            <td>Request Path</td>
                        </tr>
                        <tr>
                            <td class="code">title</td>
                            <td>A short title. (used for navigation and article header)</td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Example:</p>
                    <pre class="example"><code>/**
 * @api get /v1/users/getUser get user information
 */</code></pre>
                </article>

                <article id="param-api-description">
                    <h2>@apiDescription</h2>
                    <pre><code>@apiDescription text</code></pre>
                    <p><strong>Required!</strong></p>
                    <p>Detailed description of the API Method.</p>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">text</td>
                            <td>Multiline description text.</td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Example:</p>
                    <pre class="example"><code>/**
 * @apiDescription This is the Description.
 * It is multiline capable.
 *
 * Last line of Description.
 */
</code></pre>
                </article>

                <article id="param-api-header">
                    <h2>@apiHeader</h2>
                    <pre><code>@apiHeader type [field] description</code></pre>
                    <p>Describe a parameter passed to you API-Header e.g. for Authorization.</p>
                    <p class="similar-operation">Similar operation as <a href="#param-api-param">@apiParam</a>, only the output is above the parameters.</p>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">type</td>
                            <td>
                                Parameter type, e.g. <code>int</code>,  <code>string</code>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">field</td>
                            <td>
                                Variablename.
                            </td>
                        </tr>
                        <tr>
                            <td class="code">[field]</td>
                            <td>
                                Fieldname with brackets define the Variable as optional.
                            </td>
                        </tr>
{{--                        <tr>--}}
{{--                            <td class="code">=defaultValue<span class="label label-optional">optional</span></td>--}}
{{--                            <td>--}}
{{--                                The parameters default value.--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                        <tr>
                            <td class="code">description</td>
                            <td>
                                Description of the field.
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Examples:</p>
                    <pre class="example"><code>/**
 * @apiHeader string authorization Authorization value.
 */</code></pre>
                </article>

                <article id="param-api-header-example">
                    <h2>@apiHeaderExample</h2>
                    <pre><code>@apiHeaderExample title:
                   example</code></pre>
                    <p>Parameter request example.must be <code>json</code></p>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">title</td>
                            <td>
                                Short title for the example. note there a <code>:</code>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">example</td>
                            <td>
                                Detailed example, multilines capable.
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Example:</p>
                    <pre class="example"><code>/**
 * @apiHeaderExample Header-Example:
 * {
 *     "Accept-Encoding": "Accept-Encoding: gzip, deflate"
 * }
 */</code></pre>
                </article>

                <article id="param-api-param">
                    <h2>@apiParam</h2>
                    <pre><code>@apiParam type [field] description</code></pre>
                    <p>Describe a parameter passed to you API-Method.</p>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">type</td>
                            <td>
                                Parameter type, e.g. <code>bool</code>, <code>int</code>, <code>string</code>, <code>json</code>, <code>file</code>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">field</td>
                            <td>
                                Fieldname.
                            </td>
                        </tr>
                        <tr>
                            <td class="code">[field]</td>
                            <td>
                                Fieldname with brackets define the Variable as optional.
                            </td>
                        </tr>
{{--                        <tr>--}}
{{--                            <td class="code">=defaultValue<span class="label label-optional">optional</span></td>--}}
{{--                            <td>--}}
{{--                                The parameters default value.--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                        <tr>
                            <td class="code">description</td>
                            <td>
                                Description of the field.
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Examples:</p>
                    <pre class="example"><code>/**
 * @api {post} /user/update
 * @apiHeader string authorization Authorization value.
 * @apiParam string [firstname]   ptional Firstname of the User.
 * @apiParam string lastname      Mandatory Lastname.
 * @apiParam int [age]            Optional Age of the User.
 * @apiParam bool status          Mandatory status,true is enable and false is disable
 * @apiParam string [password]      Only logged in users can post this
 * @apiParam json [intro]         Optional nested address object.
 * @apiParam file [avatar]        Optional avatar of the User.
 */</code></pre>
                </article>

                <article id="param-api-param-example">
                    <h2>@apiParamExample</h2>
                    <pre><code>@apiParamExample title:
                   example</code></pre>
                    <p>Parameter request example.must be <code>json</code></p>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">title</td>
                            <td>
                                Short title for the example. note there a <code>:</code>
                            </td>
                        </tr>
                        <tr>
                            <td class="code">example</td>
                            <td>
                                Detailed example, multilines capable.
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Example:</p>
                    <pre class="example"><code>/**
 * @apiParamExample Request-Example:
 * {
 *    "id": 4711
 * }
 */</code></pre>
                </article>

                <article id="param-api-error-example">
                    <h2>@apiErrorExample</h2>
                    <pre><code>@apiErrorExample title:
                 example</code></pre>
                    <p>Example of an error return message, output as a pre-formatted code.must be <code>json</code></p>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">title</td>
                            <td>
                                Short title for the example.
                            </td>
                        </tr>
                        <tr>
                            <td class="code">example</td>
                            <td>
                                Detailed example, multilines capable.
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Example:</p>
                    <pre class="example"><code>/**
 * @apiErrorExample Error-Response:
 *     HTTP/1.1 404 Not Found
 *     {
 *       "error": "UserNotFound"
 *     }
 */</code></pre>
                </article>

                <article id="param-api-success-example">
                    <h2>@apiSuccessExample</h2>
                    <pre><code>@apiSuccessExample title:
                   example</code></pre>
                    <p>Example of a success return message, output as a pre-formatted code.must be <code>json</code></p>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">title</td>
                            <td>
                                Short title for the example.
                            </td>
                        </tr>
                        <tr>
                            <td class="code">example</td>
                            <td>
                                Detailed example, multilines capable.
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Example:</p>
                    <pre class="example"><code>/**
 * @apiSuccessExample Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       "firstname": "John",
 *       "lastname": "Doe"
 *     }
 */</code></pre>
                </article>

                <article id="param-api-sample-request">
                    <h2>@apiSampleRequest</h2>
                    <pre><code>@apiSampleRequest bool</code></pre>
                    <p>This is a Boolean value. If the front end is allowed to send request operations, please set this parameter to true</p>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="code">bool<span class="label label-optional">optional</span></td>
                            <td>
                                Whether the front end displays the send request operation, <code>true</code>/<code>false</code>/<code>null</code>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <p>Examples:</p>
                    <p>the front end will display,This will send the api request to <strong>/user/getUser</strong></p>
                    <pre class="example"><code>/**
 * @api get /user/getUser
 * @apiSampleRequest true
 */</code></pre>
                </article>
            </section>

            <section id="license">
                <h1>MIT License</h1>

                <article>
                    <p>
                        <a href="https://github.com/pucoder/apidoc/blob/master/LICENSE">LICENSE</a>Copyright (c) 2019-2020 pudejun
                    </p>

                    <p>Contact, support and error reporting on GitHub: <a href="https://github.com/pucoder/apidoc/issues">issues</a></p>
                </article>
            </section>

        </div><!-- /#content -->
    </div>

</div><!-- /.container -->

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        let headerSize = 70;
        // Anchor scroll
        $("a").each(function() {
            if($(this).attr("href").substr(0, 1) === "#") {
                $(this).on("click", function(e) {
                    e.preventDefault();
                    let id = $(this).attr("href");
                    $("html,body").animate({ scrollTop: parseInt($(id).offset().top) - headerSize }, 200);
                    window.location.hash = $(this).attr("href");
                });
            }
        });
        if(window.location.hash) {
            let id = window.location.hash;
            setTimeout(function() {
                $("html,body").animate({ scrollTop: parseInt($(id).offset().top) - headerSize }, 0);
            }, 1);
        }


        let doc = $(document);
        let nav = $(".nav-main");
        let params = $("#nav-main-params");

        // Simple fix nav-main Scrollposition (no-resize)
        let maxMove = params.offset().top - headerSize;
        let height = nav.height() - (params.position().top - nav.position().top) + headerSize;
        // Enable if screen is heigh enough
        if(doc.height() >= height) {
            moveNav();
            doc.scroll(function() { moveNav(); });
        }

        function moveNav() {
            if(doc.scrollTop() > maxMove) {
                nav.css({ marginTop: doc.scrollTop() - maxMove });
            } else {
                nav.css({ marginTop: 0 });
            }
        }
    });
</script>
</body>
</html>
