// Modules
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { NgxsModule } from '@ngxs/store';

// Services
import { ProduitService } from './produit.service';

// Composants
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { BodyComponent } from './components/body/body.component';
import { FooterComponent } from './components/footer/footer.component';
import { ListeProduitComponent } from './components/liste-produit/liste-produit.component';
import { SearchComponent } from './components/search/search.component';
import { PanierComponent } from './components/panier/panier.component';

// States
import { PanierState } from './shared/states/panier-state';
import { LoginComponent } from './components/login/login.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    BodyComponent,
    FooterComponent,
    ListeProduitComponent,
    SearchComponent,
    PanierComponent,
    LoginComponent,
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    AppRoutingModule,
    NgxsModule.forRoot([PanierState]),
  ],
  providers: [ProduitService],
  bootstrap: [AppComponent],
})
export class AppModule {}