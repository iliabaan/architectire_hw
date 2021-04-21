/*
* filtered() - вычисляемое свойство в компоненте Vue.
* Спаггети-код, очень много if, return.
* Решение - разбить на мелкие методы, возвращающие результат в filtered().
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
    }