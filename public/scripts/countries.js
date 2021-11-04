
window.onload = function()
{
    countryList()
    button.onclick = addCountry
};

let countries = document.querySelector('#country-btn')
let button = document.querySelector('.button-submit')

let errorMessage = document.querySelector('.message-block')
let closeMessage = document.querySelector('.close-message')

/**
 * opening the model window and output array with countries
 */


function countryList ()
{

    let model = document.getElementById("country-window");
    let btn = document.getElementById("country-btn");
    let content = document.getElementById("model-content")

    btn.onclick = async function ()
    {
        model.style.display = 'block';
        let link = 'http://test3/get/countries'
        let response = await fetch(link)

        if(response.ok)
        {
            let countries = await response.json()

            for (country of countries) {
                content.innerHTML += "<p>"+country+"</p>"
                content.classList.add('fw-bold', 'mt-3')
            }
        }
        else
        {
            content.innerHTML = "<b>Страны не найдены</b>"
        }


    }

    model.onclick = function ()
    {
        if (event.target == model)
        {
            model.style.display = 'none';
            content.innerHTML = ''
        }
    }
}


/**
 * output
 * @returns {Promise<void>}
 */

async function addCountry()
{

    let countryValue = document.querySelector('#country').value


        let data =
        {
            'country': countryValue,
        }

        let json = JSON.stringify(data);
        let response = await (await fetch('http://test3/add/country', {
            'method': 'POST',
            'mode': 'no-cors',
            'headers': {
                'Content-Type': 'application/json; charset=utf-8'
            },
            'body': json
        })).text()

    templateMessages(JSON.parse(response))


}


closeMessage.onclick = closeMessages

    function closeMessages()
    {
        errorMessage.innerHTML = ''
        closeMessage.style.display = 'none'
    }



/**
 * output message
 * @param jsonResponse
 */

function templateMessages(jsonResponse)
{
    closeMessage.style.display = 'block'
    errorMessage.innerHTML = "<p>" + jsonResponse + "</p>"
    errorMessage.classList.add('text-center', 'fw-bold', 'mt-3')

    if (jsonResponse == 'Вы не написали название страны')
    {
        errorMessage.style.color = 'red'
    }
    else if (jsonResponse == 'Страна успешно добавлена')
    {
        errorMessage.style.color = 'green'
    }

}
