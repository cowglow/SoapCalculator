# SoapCalculator

Before the days of REST APIs the world used SOAP web services. Instead of JSON, we used XML to communicate. Soap clients in PHP are simple to understand and follow. You'll first need a [WSDL](https://en.wikipedia.org/wiki/Web_Services_Description_Language), which acts as instructions of what you can request and expect as response.

This project utilized a public SOAP Web Service which provides 4 methods __Add__, __Subtract__, __Multiply__, __Divide__.

### The code
The project is follows the [clear-architecture](https://github.com/jkphl/clear-architecture). On the abstract port layer you'll find the bulk of the code.
```
$soapClient = new \SoapClient($this->wsdl);
  $input = [
    'intA' => $inputs[0],
    'intB' => $inputs[1]
  ];
```
The request gets sent to the Soap web service and a specific method is utilized to read the response. 

```
switch ($operator) {
    case '+':
        $response = $soapClient->Add($input);
        return $response->AddResult;
        break;
    case '-':
        $response = $soapClient->Subtract($input);
        return $response->SubtractResult;
        break;
    case '*':
        $response = $soapClient->Multiply($input);
        return $response->MultiplyResult;
        break;
    case '/':
        $response = $soapClient->Divide($input);
        return $response->DivideResult;
        break;
}
```

### About me

I'm American living and working in Germany.

* [@cowglow](https://twitter.com/cowglow) - Say 'hi' on twitter!
* [YouTube](https://youtube.com/c/cowglow) - I'm a filmmaker
* [GitHub](https://github.com/cowglow) - but I know how to code


### Todos

 - Fork it
 - Code it!
 - Do it on your own!

License
----

MIT
