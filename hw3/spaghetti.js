/*
*
* Функция filtered расположена во Vue компоненте в вычисляемых свойствах.
* Очень много if, очень много return.
* Правильнее было бы разбить этот метод на несколько для упрощения работы с ним.
*
*/

function filtered() {
      if (this.showSorted === true) {
        if (this.sortedProducts.length) {
          this.showMessageFunc(false);
          return this.sortedProducts;
        } return this.showMessageFunc(true);
      } if (this.values === 'all') {
        this.showMessageFunc(false);
        return this.allProducts;
      } this.showMessageFunc(false);
      return this.filteredProducts([this.keys, this.values]);
    };