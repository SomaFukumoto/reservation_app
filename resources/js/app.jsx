import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import React from 'react';
import { createRoot } from 'react-dom/client';
import ModalExample from './components/ModalExample';

const modalRoot = document.getElementById('modal-root');
if (modalRoot) {
  const root = createRoot(modalRoot);
  root.render(<ModalExample />);
}
