function getDeliveryInfo(id) {

    $(function () {
        $.ajax({
            type: "get", //HTTP通信の種類
            url: `/api/delivery?prefecture_id=${id}`, //通信したいURL
            dataType: 'json'
        })
            //通信が成功したとき
            .done((res) => {
                console.log(res)
            })
            //通信が失敗したとき
            .fail((error) => {
                console.log(error.statusText)
            })
    });
}

getDeliveryInfo(1);
const prefectureList = document.getElementById('prefecture_list')
prefectureList.onchange = (e) => {
    getDeliveryInfo(e.target.value)
}
