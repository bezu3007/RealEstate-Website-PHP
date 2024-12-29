<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, intial-scale=1.0"/>
        <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" href="style.css"/>
        <title>find</title>
    </head>
    <body>
        <header>
            <div class="navbar">
                <div class="logo"><a href="#">ARARAT REAL ESTATES</a></div>
                <ui class="links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="find.php">Find</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ui>
                <a href="signup.php" class="action_btn">Get Started</a>
                <div class="toggle_btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>

            <div class="dropdown_menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="find.php">Find</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="signup.php" class="action_btn">Get Started</a></li>
            </div>
            <script>
                const toggleBtn=document.querySelector('.toggle_btn')
                const toggleBtnIcon=document.querySelector('.toggle_btn i')
                const dropDownMenu=document.querySelector('.dropdown_menu')
    
                toggleBtn.onclick = function (){
                    dropDownMenu.classList.toggle('open')
                    const isOpen = dropDownMenu.classList.contains('open')
    
                    toggleBtnIcon.classList = isOpen
                    ? 'fa-solid fa-xmark'
                    : 'fa-solid fa-bars'
                }
                
            </script>
        </header>
        <br>
         <!-- Property Selection Form -->
<form id="property-selection-form">
  <h2>Property Selection</h2>
  <label for="property-type">Property Type:</label>
  <select id="property-type">
    <option value="">--Select Property Type--</option>
    <option value="house">House</option>
    <option value="apartment">Apartment</option>
    <option value="condo">Condo</option>
  </select>

  <label for="property-price">Price Range:</label>
  <select id="property-price">
    <option value="">--Select Price Range--</option>
    <option value="100000">200,000br or less</option>
    <option value="200000">500,000br - 200,000br</option>
    <option value="500000">1,000,000br - 500,000br</option>
    <option value="1000000">1,000,000br - more</option>
  </select>

  <button type="submit">Search</button>
</form>

<!-- Property List -->
<div id="property-list">
  <!-- Property Cards will be displayed here -->
</div>
<script>
    const propertySelectionForm = document.getElementById('property-selection-form');
const propertyList = document.getElementById('property-list');

const properties = [
  {
    id: 1,
    type: 'house',
    price: 5000000,
    image: 'https://dvyvvujm9h0uq.cloudfront.net/com/articles/1523966977-realestatephotography-featured.jpg',
    address: 'Semit',
    city: 'Addis Ababa',
    zip: '12345'
  },
  {
    id: 2,
    type: 'apartment',
    price: 150000,
    image: 'https://www.bradstowehouse.com/wp-content/uploads/2021/04/outside-1-scaled.jpg',
    address: 'Express Way',
    city: 'Debre Zeit',
    zip: '12345'
  },
  {
    id: 3,
    type: 'condo',
    price: 500000,
    image: 'https://thenyhc.org/wp-content/uploads/2018/11/slide-lakeview03.jpg',
    address: 'around lake Bishoftu',
    city: 'Debre Zeit',
    state: 'CA',
    zip: '12345'
  },
  {
    id: 4,
    type: 'house',
    price: 1000000,
    image: 'https://www.bankrate.com/2020/10/02105002/What_are_real_estate_comps.jpg',
    address: 'around lake Bishoftu',
    city: 'Debre Zeit',
    state: 'CA',
    zip: '12345'
  }
];

function displayProperties(properties) {
  propertyList.innerHTML = '';

  for (let property of properties) {
    const propertyCard = document.createElement('div');
   propertyCard.classList.add('property-card');

    const propertyImage = document.createElement('img');
    propertyImage.src = property.image;
    propertyCard.appendChild(propertyImage);

    const propertyDetails = document.createElement('div');
    propertyDetails.classList.add('property-details');
    propertyCard.appendChild(propertyDetails);

    const propertyType = document.createElement('h3');
    propertyType.textContent = property.type;
    propertyDetails.appendChild(propertyType);

    const propertyPrice = document.createElement('p');
    propertyPrice.textContent = `Br${property.price.toLocaleString()}`
    propertyDetails.appendChild(propertyPrice);

    const propertyAddress = document.createElement('p');
    propertyAddress.textContent = `${property.address}, ${property.city}, ${property.zip}`;
    propertyDetails.appendChild(propertyAddress);

    propertyList.appendChild(propertyCard);
  }
}

function filterProperties(event) {
  event.preventDefault();

  const selectedPropertyType = document.getElementById('property-type').value;
  const selectedPriceRange = document.getElementById('property-price').value;

  let filteredProperties = properties;

  if (selectedPropertyType) {
    filteredProperties = filteredProperties.filter(property => property.type === selectedPropertyType);
  }

  if (selectedPriceRange) {
    filteredProperties = filteredProperties.filter(property => property.price <= selectedPriceRange);
  }

  displayProperties(filteredProperties);
}

propertySelectionForm.addEventListener('submit', filterProperties);

// Display all properties on page load
displayProperties(properties);
</script>
        <br><br><br>
        <footer>
            <table class="footer">
                <tr>
                    <td>
                        <p>ARARAT REAL ESTATES&copy;2023.All rights reserved.</p>
                    </td>
                </tr>
            </table>
        </footer>
    </body>
</html>
