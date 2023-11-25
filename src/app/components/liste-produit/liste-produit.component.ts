import { Component, OnInit } from '@angular/core';
import { ProduitService } from '../../produit.service';
import { Produit } from '../../shared/models/produit.model';
import { AddProduit } from '../../shared/actions/panier-actions';
import { Store } from '@ngxs/store';

@Component({
  selector: 'app-liste-produit',
  templateUrl: './liste-produit.component.html',
  styleUrls: ['./liste-produit.component.css']
})

export class ListeProduitComponent implements OnInit {

  produits: Produit[] = [];

  filteredProduits : Produit[] = [];

  constructor(private produitService : ProduitService, private store: Store) { }

  ngOnInit(): void {
    this.produitService.getProduits().subscribe(data => {
      this.produits = data;
      this.filteredProduits = [...this.produits];
    })
  }

  onMotCleChange(value: string) {
    this.filteredProduits = this.produits.filter((produit) =>
      produit.nom.toLowerCase().includes(value.toLowerCase()) || produit.categorie.toLowerCase().includes(value.toLowerCase())
    );
  }
 
  addProduit(produit: Produit) {
    console.log(produit);
    this.store.dispatch(new AddProduit(produit));
  }
}
