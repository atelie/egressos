$(document).ready(function() {
    
   
    //load tooltips
    $('*[rel=tooltip]').tooltip();
    
     //Mascaras   
    $("#StudentTelefone").mask("(99) 9999-9999");
    $("#StudentCelular").mask("(99) 9999-9999?9",{placeholder:""});
    //$("#form_numero").mask("9?999999",{placeholder:""});
    $("#StudentDataNasc").mask("99/99/9999");
    
    //valida formulário de cadastro e upload de usuarios
   
   jQuery.validator.addMethod("notEqual", function(value, element, param) {
    return this.optional(element) || value != param;
    }, "Selecione um valor diferente!");

    jQuery.validator.addMethod("dateBR", function(value, element) {
     //contando chars
    if(value.length!=10) return false;
    // verificando data
    var data        = value;
    var dia         = data.substr(0,2);
    var barra1      = data.substr(2,1);
    var mes         = data.substr(3,2);
    var barra2      = data.substr(5,1);
    var ano         = data.substr(6,4);
    if(data.length!=10||barra1!="/"||barra2!="/"||isNaN(dia)||isNaN(mes)||isNaN(ano)||dia>31||mes>12)return false;
    if((mes==4||mes==6||mes==9||mes==11) && dia==31)
        return false;
    if(mes==2 && (dia>29||(dia==29 && ano%4!=0)))
        return false;
    if(ano < 1900)return false;
    return true;
}, "Informe uma data válida");  // Mensagem padrão

    $("#StudentAddForm").validate(
            
        {
           errorElement: "span",
           errorClass: "text-danger",
            rules: {
                "data[Student][data_nasc]":{
                    required : true,
                    dateBR: true
                },  
                "data[Student][nome]":{
                    required : true
                },
                "data[Student][rua]":{
                    required : true
                },
                "data[Student][numero]":{
                    required : true
                },
                "data[Student][bairro]":{
                    required : true
                },
                "data[Student][cidade]":{
                    required : true
                },
                "data[Student][estado]":{
                    required : true
                },
                "data[Student][pais]":{
                    required : true
                },
                "data[Student][celular]":{
                    required : true
                },
                "data[Student][email]":{
                    required : true,
                    email: true
                },
                "data[Student][curso]":{
                    required : true
                },  
                "data[Student][ano_conclusao]":{
                    required : true
                },
                "data[Student][empresa]":{
                    required : true
                },
                "data[Student][cargo]":{
                    required : true
                }                                        
            },
            messages: {
                "data[Student][data_nasc]":{
                    required: "Insira uma data válida",
                },
                "data[Student][nome]":{
                    required: "Esse campo deve ser preenchido",
                },
                "data[Student][rua]":{
                 required: "Esse campo deve ser preenchido",
                },
                "data[Student][numero]":{
                    required: "Esse campo deve ser preenchido",
                },
                "data[Student][bairro]":{
                    required: "Esse campo deve ser preenchido",
                },
                "data[Student][cidade]":{
                 required: "Esse campo deve ser preenchido",
                },
                "data[Student][estado]":{
                    required: "Esse campo deve ser preenchido",
                },
                "data[Student][pais]":{
                    required: "Esse campo deve ser preenchido",
                }, 
                "data[Student][celular]":{
                    required: "Esse campo deve ser preenchido",
                }, 
                "data[Student][email]":{
                   required: "Esse campo deve ser preenchido",
                    email: "Insira um e-mail válido"
                },
                "data[Student][curso]":{
                    required: "Esse campo deve ser preenchido",
                },  
                "data[Student][ano_conclusao]":{
                    required: "Esse campo deve ser preenchido",
                },
                "data[Student][empresa]":{
                    required: "Esse campo deve ser preenchido",
                },
                "data[Student][cargo]":{
                   required: "Esse campo deve ser preenchido",
                }                  
            }
        }
    );
    
  
    
    
});


    

