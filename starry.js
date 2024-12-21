// Starry background effect
const numberOfStars = 1000;
const body = document.querySelector('body');

for (let i = 0; i < numberOfStars; i++) {
  const star = document.createElement('div');
  star.classList.add('star');

  // Random positions for the star's starting point
  const startX = Math.random() * 100;
  const startY = Math.random() * 100;

  // Random positions for the star's ending point
  const endX = startX + (Math.random() - 0.5) * 20; // Small deviation for natural effect
  const endY = startY + Math.random() * 50;

  // Assign custom CSS variables for random behavior
  star.style.setProperty('--random-x', startX);
  star.style.setProperty('--random-y', startY);
  star.style.setProperty('--random-x-end', endX);
  star.style.setProperty('--random-y-end', endY);
  star.style.setProperty('--random-delay', Math.random() * 5); // Delay in seconds
  star.style.setProperty('--random-opacity', Math.random() * 0.8 + 0.2); // Opacity between 0.2 and 1

  body.appendChild(star);
}