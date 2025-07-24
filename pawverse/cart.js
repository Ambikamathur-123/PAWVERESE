// Cart utility functions
function getCart() {
  return JSON.parse(localStorage.getItem('pawverse_cart') || '[]');
}
function setCart(cart) {
  localStorage.setItem('pawverse_cart', JSON.stringify(cart));
}
function updateCartBadge() {
  const badge = document.querySelector('.cart-badge');
  if (!badge) return;
  const cart = getCart();
  const count = cart.reduce((sum, item) => sum + item.qty, 0);
  badge.textContent = count > 0 ? count : '';
}
// For all pages: update badge on load
window.addEventListener('DOMContentLoaded', updateCartBadge);
function showToast(message) {
  let toast = document.getElementById('pawverse-toast');
  if (!toast) {
    toast = document.createElement('div');
    toast.id = 'pawverse-toast';
    toast.setAttribute('role', 'status');
    toast.setAttribute('aria-live', 'polite');
    document.body.appendChild(toast);
  }
  toast.textContent = message;
  toast.className = 'show';
  setTimeout(() => { toast.className = toast.className.replace('show', ''); }, 1500);
}
// For shop page: handle add to cart
if (document.querySelector('.product-grid')) {
  document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const card = btn.closest('.product-card');
      const id = card.dataset.id;
      const name = card.querySelector('h3').textContent;
      const price = parseInt(card.querySelector('.price').textContent.replace(/[^\d]/g, ''));
      const img = card.querySelector('img').src;
      let cart = getCart();
      let found = cart.find(item => item.id === id);
      if (found) { found.qty += 1; } else { cart.push({ id, name, price, img, qty: 1 }); }
      setCart(cart);
      updateCartBadge();
      btn.classList.add('added');
      showToast('Added to cart!');
      setTimeout(() => btn.classList.remove('added'), 800);
    });
  });
}
// For cart page: render cart items, handle qty/remove
if (document.querySelector('.cart-items')) {
  function renderCart() {
    const cart = getCart();
    const container = document.querySelector('.cart-items');
    container.innerHTML = '';
    let subtotal = 0;
    cart.forEach((item, idx) => {
      subtotal += item.price * item.qty;
      const div = document.createElement('div');
      div.className = 'cart-item';
      div.innerHTML = `
        <img src="${item.img}" alt="${item.name}" />
        <div class="cart-item-details">
          <h3>${item.name}</h3>
        </div>
        <span class="price">₹${item.price}</span>
        <div class="qty-controls">
          <button class="qty-btn" data-idx="${idx}" data-action="dec">-</button>
          <span>${item.qty}</span>
          <button class="qty-btn" data-idx="${idx}" data-action="inc">+</button>
        </div>
        <button class="remove-btn" data-idx="${idx}" title="Remove"><span class="material-icons">close</span></button>
      `;
      container.appendChild(div);
    });
    // Update summary
    document.querySelector('.order-summary .summary-row span:last-child').textContent = `₹${subtotal}`;
    document.querySelector('.order-summary .total span:last-child').textContent = `₹${subtotal+99}`;
    updateCartBadge();
  }
  renderCart();
  document.querySelector('.cart-items').addEventListener('click', function(e) {
    if (e.target.closest('.qty-btn')) {
      const idx = +e.target.closest('.qty-btn').dataset.idx;
      const action = e.target.closest('.qty-btn').dataset.action;
      let cart = getCart();
      if (action === 'inc') cart[idx].qty += 1;
      if (action === 'dec' && cart[idx].qty > 1) cart[idx].qty -= 1;
      setCart(cart);
      renderCart();
    }
    if (e.target.closest('.remove-btn')) {
      const idx = +e.target.closest('.remove-btn').dataset.idx;
      let cart = getCart();
      cart.splice(idx, 1);
      setCart(cart);
      renderCart();
    }
  });
}
// Toast styles
(function(){
  if (document.getElementById('pawverse-toast-style')) return;
  const style = document.createElement('style');
  style.id = 'pawverse-toast-style';
  style.textContent = `
    #pawverse-toast {
      position: fixed;
      top: 32px;
      left: 50%;
      transform: translateX(-50%);
      background: #ff6f61;
      color: #fff;
      padding: 0.9rem 2.2rem;
      border-radius: 2rem;
      font-size: 1.1rem;
      font-family: 'Montserrat', Arial, sans-serif;
      box-shadow: 0 4px 16px rgba(255,111,97,0.18);
      opacity: 0;
      pointer-events: none;
      z-index: 9999;
      transition: opacity 0.4s, top 0.4s;
    }
    #pawverse-toast.show {
      opacity: 1;
      top: 56px;
      pointer-events: auto;
    }
  `;
  document.head.appendChild(style);
})(); 