<script>
    const renderRating = (rate, key) => {

        // Extract day, month (short form), and year
        const day = rate.created_at.getDate();
        const month = rate.created_at.toLocaleString('en-US', {
            month: 'short'
        });
        const year = rate.created_at.getFullYear();


        let starsHtml = '';

        for (let i = 1; i <= rate.stars; i++) {
            starsHtml += '<i class="fa fa-star checked"></i>';
        }

        for (let j = rate.stars + 1; j <= 5; j++) {
            starsHtml += '<i class="fa fa-star"></i>';
        }

        return `<div>
                    <strong for="">${rate.user }</strong>
                    <br>
                    ${starsHtml}
                    <small>Reviewed on ${day} ${month} ${year}</small>
                    <p>${rate.review }</p>
                    ${rate.image?`<span><img src="/${rate.image}" alt="" width="50"></span><br>`:''}
                </div>
                <hr>`;

    }
</script>
