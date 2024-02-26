
document.addEventListener('DOMContentLoaded', function () {

    var data = [

        {
            "title" : "company",
            "data" : {
                // name
                // phone1
                // phone2
                // address
                // web
                // places
                // category_id
                // nit
                // url
                // description
                "input[name='name']" : "CompanyName",
                "input[name='phone1']" : "123456789",
                "input[name='phone2']" : "123456789",
                "input[name='address']" : "company address",
                "input[name='web']" : "https://www.mycompany.com",
                "select[name='main_place_id']" : "1",
                "select[name='category_id']" : "1",
                "input[name='nit']" : "12345678",
                "input[name='url']" : "company-url",
                "textarea[name='description']" : "Esta es una descripcion de la empresa",
            }
        },
        {
            "title" : "worker",
            "data" : {
                // name
                // birthday
                // phone1
                // phone2
                // address
                // web
                // main_place_id
                // main_profession_id
                // url
                // description
                "input[name='name']" : "Nombre Trabajador",
                "input[name='birthday']" : "14/01/1993",
                "input[name='phone1']" : "123456789",
                "input[name='phone2']" : "123456789",
                "input[name='address']" : "company address",
                "input[name='web']" : "https://www.mycompany.com",
                "select[name='main_place_id']" : "1",
                "select[name='main_profession_id']" : "1",
                "input[name='url']" : "worker-url",
                "textarea[name='description']" : "Esta es una descripcion del trabajador",
            }
        },



    ];


    console.log("fake filler activado")
            // <div class="fake_filler show">
            //     <ul>
            //         <li>1</li>
            //         <li>2</li>
            //         <li>3</li>
            //     </ul>
            //     <button id="floatingButton">
            //         <i class="fa fa-plus"></i>
            //     </button>
            // </div>

    var divContainer = document.createElement('div');
    divContainer.className = 'fake_filler';

    var ul = document.createElement('ul');
    // var li1 = document.createElement('li');
    // li1.appendChild(document.createTextNode('fake 1'));
    // ul.appendChild(li1);
    // var li2 = document.createElement('li');
    // li2.appendChild(document.createTextNode('fake 2'));
    // ul.appendChild(li2);
    // var li3 = document.createElement('li');
    // li3.appendChild(document.createTextNode('fake 3'));
    // ul.appendChild(li3);

    data.forEach(function (item) {
        var li = document.createElement('li');
        li.appendChild(document.createTextNode(item.title));
        li.addEventListener('click', function () {
            Object.keys(item.data).forEach(function (key) {
                var input = document.querySelector(key);
                if(input === null) {
                    console.log('Faker input not found' + key);
                    return;
                };
                // key starts with select
                if(key.startsWith('select')) {
                    var option = input.querySelector('option[value="'+item.data[key]+'"]');
                    if(option === null) {
                        console.log('Faker option not found' + item.data[key]);
                        return;
                    };
                    option.selected = true;
                }else {
                    input.value = item.data[key];
                }
            });

        });
        ul.appendChild(li);
    });


    var button = document.createElement('button');
    // button.id = 'floatingButton';
    // var i = document.createElement('i');
    // i.className = 'fa fa-plus';
    // button.appendChild(i);
    button.appendChild(document.createTextNode('fake'));


    button.addEventListener('click', function () {
        ul.style.display = (ul.style.display === 'none' || ul.style.display === '') ? 'block' : 'none';
    });

    var styleElement = document.createElement('style');
    var styles = `
    .fake_filler,
    .fake_filler ul {
        position: absolute;
        margin: 0;
        padding: 0;
        list-style: none;
        cursor : pointer;
        z-index: 1000;
    }

    .fake_filler ul {
        display: none;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        position: fixed;
        right: 20px;
        bottom: 60px;
    }

    .fake_filler ul li {
        height: 30px;
        padding: 0 10px;
        cursor: pointer;
    }


    .fake_filler button {
        position: fixed;
        bottom: 10px; /* Ajusta según sea necesario */
        right: 10px; /* Ajusta según sea necesario */
        background-color: #3498db;
        color: #fff;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    `;

    styleElement.appendChild(document.createTextNode(styles));
    document.head.appendChild(styleElement);

    divContainer.appendChild(ul);
    divContainer.appendChild(button);
    document.body.appendChild(divContainer);

});
